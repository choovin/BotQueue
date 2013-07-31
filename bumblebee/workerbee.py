import time
import hive
import botqueueapi
import logging
import json

class WorkerBee():
    
  def __init__(self, data, mosi_queue, miso_queue):

    #find our local config info.
    self.global_config = hive.config.get()
    if data['driver_config']:
      self.config = data['driver_config']
    else:
      self.log.error("Driver config not found!  Falling back to hardcoded workers.")
      for row in self.global_config['workers']:
        if row['name'] == data['name']:
          self.config = row
    
    #communications with our mother bee!
    self.mosi_queue = mosi_queue
    self.miso_queue = miso_queue

    #we need logging!
    self.log = logging.getLogger('botqueue')

    #get various objects we'll need
    self.api = botqueueapi.BotQueueAPI()
    self.job = bumblejob.bumblejob()
    self.data = data
    self.running = False
    self.lastUpdate = 0
    self.lastLocalUpdate = 0
    self.sleepTime = 0.5  
 
  #our main loop for all job processing
  def run(self):
    #look at our current state to check for problems.
    try:
      self.info("Worker startup")
      self.running = True

      #we shouldn't startup in a working state... that implies some sort of error.
      if (self.data['status'] == 'working'):
        self.errorMode("Startup in %s mode, dropping job # %s" % (self.data['status'], self.data['job']['id']))

      #this is our main processing loop.
      while self.running:
        #see if there are any messages from the motherbee
        self.checkMessages()

        #did we get a job?
        if 'job' in self.data:
          #create our job
          self.job = self.jobFactory(self.data['job'])
          self.job.start()

          #keep an eye on our job while its running
          while self.job.isRunning():
            #see if there are any messages from the motherbee
            self.checkMessages()

            #okay, let everyone know our status/progress
            self.updateHomeBase(interval = 15, self.job.getResults())

          #okay, our job is done.
          if self.job.isFinished():
            self.finishJob()

        #ping homebase to let her know we're alive
        self.updateHomeBase(interval = 90)

        # sleep for a bit to not hog resources
        time.sleep(self.sleepTime)

    #anything bad happen?   
    except Exception as ex:
      self.exception(ex)

    #peace out.
    self.debug("Exiting.")
     
  #crap, did something go wrong?
  def errorMode(self, error):
    self.error("Error mode: %s" % error)
    
    #drop 'em if you got em.
    try:
      self.dropJob(error)
    except Exception as ex:
      self.exception(ex)
           
    #take the bot offline.
    self.info("Setting bot status as error.")
    result = self.api.updateBotInfo({'bot_id' : self.data['id'], 'status' : 'error', 'error_text' : error})
    if result['status'] == 'success':
      self.changeStatus(result['data'])
    else:
      self.error("Error talking to mothership: %s" % result['error'])

  def finishJob(self):
    #update our slice job progress and pull in our update info.
    self.info("Finished job, uploading results to main site.")
    result = self.api.finishJob(job_id=self.job.payload['id'], result = self.job.getResult())

    #now pull in our new data.
    self.changeStatus(result['data'])

    #notify the queen bee of our status.
    self.sendMessage('job_update', self.job.getStatus())

  #get bot info from the mothership
  def getOurInfo(self):
    self.debug("Looking up bot #%s." % self.data['id'])
    
    result = self.api.getBotInfo(self.data['id'])
    if (result['status'] == 'success'):
      self.changeStatus(result['data'])
    else:
      self.error("Error looking up bot info: %s" % result['error'])
      raise Exception("Error looking up bot info: %s" % result['error'])

  def jobFactory(self, payload):

    #format our job name into a class and such
    job_type = self.data['job']['type']
    module_name = 'jobs.' + job_type + 'job'
    __import__(module_name)

    #okay, instantiate the right class and return it.
    if (self.data['job']['type'] == 'print'):
      return jobs.printjob.printjob(payload);
    elif (self.data['job']['type'] == 'slice'):
      return jobs.slicejob.slicejob(payload);
    elif (self.data['job']['type'] == 'timelapse'):
      return jobs.timelapsejob.timelapsejob(payload);
    elif (self.data['job']['type'] == 'render'):
      return jobs.renderjob.renderjob(payload);
    elif (self.data['job']['type'] == 'imageresize'):
      return jobs.imageresizejob.imageresizejob(payload);
    elif (self.data['job']['type'] == 'modelparse'):
      return jobs.modelparsejob.modelparsejob(payload);
    else:
      raise Exception("Unknown job type '%s' specified." % job_type)

  def pauseJob(self):
    self.info("Pausing job.")
    self.job.pause()

  def resumeJob(self):
    self.info("Resuming job.")
    self.job.resume()

  def stopJob(self):
    self.info("Stopping job.")
    self.job.stop()
        
  #todo: make this more robust.
  def dropJob(self, error = False):
    #only drop if we're actually running a job
    if self.job.isRunning()):

      #okay, stop our job too.
      self.stopJob()

      if error:
        self.info("Dropping existing job (%s)" % error)
      else:
        self.info("Dropping existing job")

      #make the call.
      result = self.api.dropJob(self.data['job']['id'], error)
      if (result['status'] == 'success'):
        self.getOurInfo()
      else:
        raise Exception("Unable to drop job: %s" % result['error'])
 
  #we're done here - bail.
  def shutdown(self):
    self.info("Shutting down.")
    if (self.job.isRunning()):
      self.dropJob("Shutting down.")
    self.running = False
   
  #todo: this doesn't quite feel right.  should be merged with finishJob()
  #let bumblebee know this job has changed statuses.
  def changeStatus(self, data):
    #check for message sending first because if we get stale info, it might cause issues with our new state.
    self.checkMessages()
    self.sendMessage('worker_update', data)
    self.data = data
      
  #notify the bumblebee host
  def sendMessage(self, name, data = False):
    self.checkMessages()
    #self.debug("Sending message")
    msg = Message(name, data)
    self.miso_queue.put(msg)
    
  #loop through out queue and check for messages.
  def checkMessages(self):
    #self.debug("Checking messages.")
    while not self.mosi_queue.empty():
      message = self.mosi_queue.get(False)
      self.handleMessage(message)
      self.mosi_queue.task_done()

  #these are the messages we know about.
  def handleMessage(self, message):

    #self.debug("Got message %s" % message.name)

    #mothership gave us new information!
    if message.name == 'updatedata':
      if message.data['status'] != self.data['status']:
        self.info("Changing status from %s to %s" % (self.data['status'], message.data['status']))

        #okay, are we transitioning from paused to unpaused?
        if message.data['status'] == 'paused':
          self.pauseJob()
        if self.data['status'] == 'paused' and message.data['status'] == 'working':
          self.resumeJob()

      status = message.data['status']

      #did our status change?  if so, make sure to stop our currently running job.
      if (self.data['status'] == 'working' or self.data['status'] == 'paused') and (status == 'idle' or status == 'offline' or status == 'error' or status == 'maintenance'):
        self.info("Stopping job.")
        self.stopJob()

      #did we get a new config?
      if json.dumps(message.data['driver_config']) != json.dumps(self.config):
        self.log.info("Driver config has changed, updating.")
        self.config = config
      
      self.data = message.data
    #time to die, mr bond!
    elif message.name == 'shutdown':
      if self.job.isRunning():
        self.stopJob()
      self.shutdown()
      pass

  def debug(self, msg):
    self.log.debug("%s: %s" % (self.config['name'], msg))

  def info(self, msg):
    self.log.info("%s: %s" % (self.config['name'], msg))

  def warning(self, msg):
    self.log.warning("%s: %s" % (self.config['name'], msg))

  def error(self, msg):
    self.log.error("%s: %s" % (self.config['name'], msg))
    
  def exception(self, msg):
    self.log.exception("%s: %s" % (self.config['name'], msg))

  #TODO: make the payload stuff ubiquitous across the board.
  def updateHomeBase(self, interval = 60, payload = None, files = {}):

    #notify bumblebee of our status.
    if time.time() - self.lastLocalUpdate > 0.5 and self.job.isRunning():
      self.lastLocalUpdate = time.time()
      self.sendMessage('job_update', self.job.getStatus())

    #notify the botqueue.com mothership of our status
    if time.time() - self.lastUpdate > interval:
      self.lastUpdate = time.time()
      self.info("job progress: %0.2f%%" % payload['progress'])
    
      #include a webcam picture?
      if self.takePicture(outputName):
        outputName = "bot-%s.jpg" % self.data['id']
        files['webcam'] = outputName;
        
      #okay, send it to the botqueue.com server!
      self.api.updateJobProgress(self.data['job']['id'], payload, files)

  #take a webcam picture if we're configured for it.
  def takePicture(self, filename):
    #create our command to do the webcam image grabbing
    try:
      
      #do we even have a webcam config setup?
      if 'webcam' in self.config:
        if self.data['status'] == 'working':
          watermark = "%s :: %0.2f%% :: BotQueue.com" % (self.config['name'], float(self.data['job']['progress']))
        else:
          watermark = "%s :: BotQueue.com" % self.config['name']

        device = self.config['webcam']['device']

        brightness = 50
        if 'brightness' in self.config['webcam']:
          brightness = self.config['webcam']['brightness']

        contrast = 50
        if 'contrast' in self.config['webcam']:
          contrast = self.config['webcam']['contrast']
              
        return hive.takePicture(device=device, watermark=watermark, output=filename, brightness=brightness, contrast=contrast)

      else:
        return False

    #main try/catch block  
    except Exception as ex:
      self.exception(ex)
      return False

#todo: move to hive?
class Message():
  def __init__(self, name, data = None):
    self.name = name
    self.data = data
