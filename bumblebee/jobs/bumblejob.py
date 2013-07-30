import time
from threading import Thread
import logging
import hive

class bumblejob(object):

  def __init__(self, payload = {}, api = None):
    self.payload = payload
    self.result = {}
    self.log = logging.getLogger('botqueue')
    self.thread = None
    self.running = True
    self.paused = False
  
  def start(self):
    self.log.debug("BumbleJob: start job")
    self.running = True
    self.thread = Thread(target=self.run).start()
    
  def run(self):
    pass
    
  def stop():
    self.running = False
    
  def isRunning(self):
    return self.running

  def isPaused(self):
    return self.paused

  def getPercentage(self):
    return 0
    
  def getStatus(self):
    pass
    
  def pause(self):
    self.paused = True

  def resume(self):
    self.paused = False
    
  #todo: fix me!
  def downloadFile(self, fileinfo):
    myfile = hive.URLFile(fileinfo)

    localUpdate = 0
    try:
      myfile.load()

      while myfile.getProgress() < 100:
        #notify the local mothership of our status.
        if (time.time() - localUpdate > 0.5):
          self.data['job']['progress'] = myfile.getProgress()
          self.sendMessage('job_update', self.data['job'])
          localUpdate = time.time()
        time.sleep(self.sleepTime)
      #okay, we're done... send it back.
      return myfile
    except Exception as ex:
      self.exception(ex)