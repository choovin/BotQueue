import bumblejob
import ginsu
import logging
import os
import hashlib
import shutil

class slicejob(bumblejob.bumblejob):

  def run(self):
    #download our slice file
    sliceFile = self.downloadFile(self.payload['slicejob']['input_file'])
    
    #create and run our slicer
    self.g = ginsu.Ginsu(sliceFile, self.payload['slicejob'])
    self.g.slice()
    
    #watch the slicing progress
    while self.g.isRunning():

      #are we still going?
      if not self.isRunning():
        return
    
      self.progress = self.g.getProgress()
      time.sleep(0.25)
    
    #how did it go?
    sushi = self.g.sliceResult

    #move the file to the cache directory
    cacheDir = hive.getCacheDirectory()
    baseFilename = os.path.splitext(os.path.basename(self.payload['slicejob']['input_file']['name']))[0]
    md5sum = hive.md5sumfile(sushi.output_file)
    uploadFile = "%s%s-%s.gcode" % (cacheDir, md5sum, baseFilename)
    self.log.debug("Moved slice output to %s" % uploadFile)
    shutil.copy(sushi.output_file, uploadFile)

    #format our result object
    self.result['status'] = sushi.status
    self.result['output'] = sushi.output_log
    self.result['error'] = sushi.error_log
    self.result['files'] = {'output' : uploadFile}
    
    #mark ourselves as finished
    self.finished = True
    
  def stop(self):
    if self.g:
      self.g.stop()
    super(slicejob, self).stop()
    