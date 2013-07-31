import time
from threading import Thread
import logging

class bumbledriver(object):

  def __init__(self, config):
    self.config = config
    self.printing = False
    self.paused = False
    self.connected = False
    self.jobfile = None
    self.filesize = 0
    self.error = False
    self.errorMessage = None
    self.log = logging.getLogger('botqueue')

  def executeFile(self):
    self.log.debug("Bumbledrive: execute file.")
    pass

  def connect(self):
    self.connected = True
    
  def disconnect(self):
    self.connected = False
    
  def pause(self):
    self.paused = True
    
  def resume(self):
    self.paused = False
  
  def stop(self):
    self.printing = False
    self.reset()

  def reset(self):
    pass

  def startPrint(self, jobfile):
    self.log.debug("Bumbledrive: startprint")
    if(self.isRunning() or not self.isConnected()):
        return False

    self.log.debug("Bumbledrive: starting thread.")
    self.jobfile = jobfile
    self.printing=True
    Thread(target=self.printThreadEntry).start()

  def printThreadEntry(self):
    try:
      self.log.debug("Bumbledrive: print thread entry.")
      self.executeFile()
      self.finishPrint()
    except Exception as ex:
      self.log.exception(ex)

  def finishPrint(self):
    self.log.debug("Bumbledrive: finishing print.")
    self.printing = False
    
  def getPercentage(self):
    return 0

  def getStatus(self):
    pass
    
  def hasError(self):
    return self.error

  def getTemperature(self):
    return False

  def getErrorMessage(self):
    return self.errorMessage
    
  def isConnected(self):
    return self.connected
    
  def isRunning(self):
    return self.printing
    
  def isPaused(self):
    return self.paused