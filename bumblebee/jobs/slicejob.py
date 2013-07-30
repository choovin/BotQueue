import bumblejob
import ginsu
import logging

class slicejob(bumblejob.bumblejob):
  
  def run(self):
    #download our slice file
    sliceFile = self.downloadFile(self.payload['slicejob']['input_file'])
    
    #create and run our slicer
    g = ginsu.Ginsu(sliceFile, self.payload['slicejob'])
    g.slice()
    
    #watch the slicing progress
    localUpdate = 0
    lastUpdate = 0
    while g.isRunning():
      #check for messages like shutdown or stop job.
      self.checkMessages()
      if not self.running or self.data['status'] != 'slicing':
        self.debug("Stopping slice job")
        g.stop()
        return
      
      #notify the local mothership of our status.
      if (time.time() - localUpdate > 0.5):
        self.payload['progress'] = g.getProgress()
        self.sendMessage('job_update', self.payload)
        localUpdate = time.time()
        
      #occasionally update home base.
      if (time.time() - lastUpdate > 15):
        lastUpdate = time.time()
        self.api.updateJobProgress(self.payload['id'], "%0.5f" % g.getProgress())
        
      time.sleep(self.sleepTime)
    
  def jobFinishedHook(self):
    #how did it go?
    sushi = g.sliceResult
    
    #move the file to the cache directory
    cacheDir = hive.getCacheDirectory()
    baseFilename = os.path.splitext(os.path.basename(self.payload['slicejob']['input_file']['name']))[0]
    md5sum = hive.md5sumfile(sushi.output_file)
    uploadFile = "%s%s-%s.gcode" % (cacheDir, md5sum, baseFilename)
    self.debug("Moved slice output to %s" % uploadFile)
    shutil.copy(sushi.output_file, uploadFile)

    #update our slice job progress and pull in our update info.
    self.info("Finished slicing, uploading results to main site.")
    result = self.api.updateSliceJob(job_id=self.payload['slicejob']['id'], status=sushi.status, output=sushi.output_log, errors=sushi.error_log, filename=uploadFile)

    #hack because the upload takes forever and mothership probably has an old status.
    self.checkMessages()

    #now pull in our new data.
    self.changeStatus(result['data'])
    
    #notify the queen bee of our status.
    self.sendMessage('job_update', self.payload)
    