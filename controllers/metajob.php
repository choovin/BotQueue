<?
  /*
    This file is part of BotQueue.

    BotQueue is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    BotQueue is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with BotQueue.  If not, see <http://www.gnu.org/licenses/>.
  */

	class MetaJobController extends Controller
	{
	  public function view()
	  {
	    $this->set('area', 'jobs');
	    
	    try
	    {
	      //load the data and check for errors.
        $job = new MetaJob($this->args('id'));
        if (!$job->isHydrated())
          throw new Exception("That job does not exist.");
        //can we view it?
        if ($job->get('user_id') != User::$me->id)
          throw new Exception("You do not have access to view this job.");
        
        //save our job
        $this->set('metajob', $job);
      }
      catch (Exception $e)
      {
        $this->setTitle("Job - Error");
        $this->set('megaerror', $e->getMessage());
      }
	  }
	  
	  public function slicejob_view()
	  {
      $mj = $this->args('metajob');
      $sj = $mj->getSubJob();
      
      $this->set('mj', $mj);
      $this->set('sj', $sj);
	    $this->set('inputfile', $sj->getInputFile());
      $this->set('outputfile', $sj->getOutputFile());
      $this->set('config', $sj->getSliceConfig());
      $this->set('engine', $this->get('config')->getEngine());
      
      $this->setTitle("Slice Job - " . $sj->getLink());
	  }
	  
	  public function printjob_view()
	  {
      $mj = $this->args('metajob');
      $sj = $mj->getSubJob();

      $this->set('mj', $mj);
      $this->set('sj', $sj);

	    $this->setTitle("Print Job - " . $sj->getLink());
	  }

	  public function update()
	  {
	    $this->set('area', 'jobs');
	    
	    try
	    {
	      //load the data and check for errors.
        $job = new MetaJob($this->args('id'));
        if (!$job->isHydrated())
          throw new Exception("That job does not exist.");
        if ($job->get('user_id') != User::$me->id)
          throw new Exception("You do not have access to view this slice job.");
        if ($job->get('status') != 'qa')
          throw new Exception("This job is not in a pending state.");
          
        if ($this->args('pass'))
          $job->pass();
        if ($this->args('fail'))
          $job->fail();
          
        $this->forwardToUrl($job->getUrl());
      }
      catch (Exception $e)
      {
        $this->setTitle("Job - Error");
        $this->set('megaerror', $e->getMessage());
      }
	  }
	}
?>