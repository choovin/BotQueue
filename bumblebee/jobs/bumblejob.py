import time
from threading import Thread
import logging

class bumblejob(object):

  def __init__(self, payload, api):
    self.payload = payload
    self.api = api
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