import bumblejob
import logging

class printjob(bumblejob.bumblejob):

  def initializeDriver(self):
    #try:
    #  if self.driver:
    #    self.driver.disconnect()
    #except Exception as ex:
    #  self.exception("Disconnecting driver: %s" % ex)
    
    try:
      self.driver = self.driverFactory()
      #self.debug("Connecting to driver.")
      #self.driver.connect()
    except Exception as ex:
      self.exception(ex) #dump a stacktrace for debugging.
      self.errorMode(ex)
      #self.driver.disconnect()
  
  def stop(self):
    #todo: move to printjob class
    if self.driver and not self.driver.hasError():
      if self.driver.isRunning() or self.driver.isPaused():
        self.info("stopping driver.")
        self.driver.stop()
    
  #TODO: driver info should come from payload!!!
  def driverFactory(self):

    module_name = 'drivers.' + self.config['driver'] + 'driver'
    __import__(module_name)

    if (self.config['driver'] == 's3g'):
      return drivers.s3gdriver.s3gdriver(self.config);
    elif (self.config['driver'] == 'printcore'):
      return drivers.printcoredriver.printcoredriver(self.config)
    elif (self.config['driver'] == 'dummy'):
      return drivers.dummydriver.dummydriver(self.config)
    else:
      raise Exception("Unknown driver specified.")
      
  #move to printjob class
  def processJob(self):
    #go get 'em, tiger!
    self.jobFile = self.downloadFile(self.data['job']['file'])

    #notify the mothership of download completion
    self.api.downloadedJob(self.data['job']['id'])

    currentPosition = 0
    localUpdate = 0
    lastUpdate = 0
    lastTemp = 0
    try:
      self.driver.startPrint(self.jobFile)
      while self.driver.isRunning():
        latest = self.driver.getPercentage()

        #look up our temps?
        if (time.time() - lastTemp > 1):
          lastTemp = time.time()
          temps = self.driver.getTemperature()

        #check for messages like shutdown or stop job.
        self.checkMessages()

        #did we get paused?
        while self.data['status'] == 'paused':
          self.checkMessages()
          time.sleep(self.sleepTime)

        #should we bail out of here?
        if not self.running or self.data['status'] != 'working':
          self.stopJob()
          return

        #occasionally update home base.
        if (time.time() - lastUpdate > 15):
          lastUpdate = time.time()
          self.updateHomeBase(latest, temps)

        if self.driver.hasError():
          raise Exception(self.driver.getErrorMessage())

        time.sleep(self.sleepTime)

      #did our print finish while running?
      if self.running and self.data['status'] == 'working':
        self.info("Print finished.")

        #send up a final 100% info.
        self.data['job']['progress'] = 100.0
        self.updateHomeBase(latest, temps)

        #finish the job online, and mark as completed.
        result = self.api.completeJob(self.data['job']['id'])
        if result['status'] == 'success':
          self.changeStatus(result['data']['bot'])

          #notify the queen bee of our status.
          self.sendMessage('job_update', self.data['job'])
        else:
          self.error("Error notifying mothership: %s" % result['error'])
    except Exception as ex:
      self.exception(ex)
      self.errorMode(ex)