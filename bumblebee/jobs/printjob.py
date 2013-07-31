import bumblejob
import logging
import drivers


class printjob(bumblejob.bumblejob):

  def initializeDriver(self):
    try:
      self.driver = self.driverFactory()
    except Exception as ex:
      self.exception(ex) #dump a stacktrace for debugging.
      self.errorMode(ex)
  
  def driverFactory(self):

    module_name = 'drivers.' + self.payload['driver']['driver'] + 'driver'
    __import__(module_name)

    if (self.payload['driver'] == 's3g'):
      return drivers.s3gdriver.s3gdriver(self.payload['driver']);
    elif (self.payload['driver'] == 'printcore'):
      return drivers.printcoredriver.printcoredriver(self.payload['driver'])
    elif (self.payload['driver'] == 'dummy'):
      return drivers.dummydriver.dummydriver(self.payload['driver'])
    else:
      raise Exception("Unknown driver specified.")

  def run(self):
    lastTemp = 0
    try:
      #go get 'em, tiger!
      self.jobFile = self.downloadFile(self.payload['printjob']['file'])

      #todo: figure out how to notify mothership of sub-status notifications
      #notify the mothership of download completion
      #self.api.downloadedJob(self.payload['job']['id'])
      
      #fire up our print driver.
      self.initializeDriver()
      self.driver.startPrint(self.jobFile)
      while self.driver.isRunning():
        
        #how is our progress?
        self.progress = self.driver.getPercentage()

        #look up our temps?
        if (time.time() - lastTemp > 1):
          lastTemp = time.time()
          self.status['temps'] = self.driver.getTemperature()

        #did we get paused?
        while self.isPaused():
          time.sleep(0.25)

        #should we bail out of here?
        if not self.isRunning():
          return

        #crap, did the driver error out?
        if self.driver.hasError():
          raise Exception(self.driver.getErrorMessage())

        #relax for a bit.
        time.sleep(0.25)

      #did our print finish while running?
      if self.isRunning():
        #send up a final 100% info.
        self.progress = 100
        
        #okay, format our result
        self.result['status'] = 'pending'
        
        #mark ourselves as finished
        self.finished = True

    except Exception as ex:
      self.finished = True
      self.result['status'] = 'failure'
      self.result['error'] = ex.getMessage()
      self.log.exception(ex)

  def stop(self):
    if self.driver and not self.driver.hasError():
      if self.driver.isRunning() or self.driver.isPaused():
        self.log.info("stopping driver.")
        self.driver.stop()
    super(printjob, self).stop()

  def pause(self):
    if self.driver:
      self.driver.pause()
    super(printjob, self).pause()

  def resume(self):
    if self.driver:
      self.driver.resumse()
    super(printjob, self).resume()