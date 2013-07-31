import time
from threading import Thread
import logging
import hive

class bumblejob(object):

  def __init__(self, payload = {}, api = None):
    self.payload = payload
    self.progress = 0
    self.status = {}
    self.result = {}

    self.log = logging.getLogger('botqueue')

    self.thread = None
    self.running = False
    self.paused = False
    self.finished = False
  
  def start(self):
    self.log.debug("BumbleJob: start job")
    self.running = True
    self.paused = False
    self.finished = False
    self.thread = Thread(target=self.run).start()
    
  def run(self):
    self.finished = True
    pass
    
  def stop():
    self.running = False

  def pause(self):
    self.paused = True

  def resume(self):
    self.paused = False
    
  def isRunning(self):
    return self.running and self.thread.is_alive()
    
  def isFinished(self):
    return self.finished

  def isPaused(self):
    return self.paused

  def getPercentage(self):
    return self.progress
    
  def getStatus(self):
    self.status['progress'] = self.progress
    return self.status
    
  def getResult(self):
    return self.result
    
  def downloadFile(self, fileinfo):
    try:
      #start the download
      myfile = hive.URLFile(fileinfo)
      myfile.load()

      #update our progress bar while we download
      while myfile.getProgress() < 100:
        self.progress = myfile.getProgress()
        time.sleep(self.sleepTime)

      #okay, we're done... send it back.
      return myfile
    except Exception as ex:
      self.exception(ex)