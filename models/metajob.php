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

	class MetaJob extends Model
	{
		public function __construct($id = null)
		{
			parent::__construct($id, "meta_jobs");
		}
		
		public function getName()
		{
			return "#" . str_pad($this->id, 6, "0", STR_PAD_LEFT);
		}
		
		public function getUrl()
		{
		  return "/metajob:" . $this->id;
		}

		public function getAPIData()
		{
			$r = array();
			$r['id'] = $this->id;
			$r['name'] = $this->getName();
			$r['bot_id'] = $this->get('bot_id');
			$r['user_id'] = $this->get('user_id');
			$r['subjob'] = $this->getSubJob()->getAPIData();
			$r['subjob_type'] = $this->get('subjob_type');
			$r['status'] = $this->get('status');
      $r['progress'] = $this->get('progress');
      $r['output_log'] = $this->get('output_log');
      $r['error_log'] = $this->get('error_log');
      $r['add_date'] = $this->get('add_date');
      $r['taken_date'] = $this->get('taken_date');
      $r['finish_date'] = $this->get('finish_date');
      $r['qa_date'] = $this->get('qa_date');
      $r['uid'] = $this->get('uid');

			return $r;
		}
		
		public function getUser()
		{
		  return new User($this->get('user_id'));
		}
		
		public function getSubJob()
		{
		  if ($this->get('subjob_type') == 'print')
		    return new PrintJob($this->get('subjob_id'));
		  else if ($this->get('subjob_type') == 'slice')
		    return new SliceJob($this->get('subjob_id'));
		  else
		    return False;
		}
		
		public function getBot()
		{
		  return new Bot($this->get('bot_id'));
		}

		public function delete()
		{
		  //todo: delete our subjobs?
		  			
			parent::delete();
		}

		public function getStatusHTML()
		{
			return "<span class=\"label " . self::getStatusHTMLClass($this->get('status')) . "\">" . $this->get('status') . "</span>";
		}
		
		public static function getStatusHTMLClass($status)
		{
			$s2c = array(
				'available' => '',
				'taken' => 'label-info',
				'qa' => 'label-warning',
				'pass' => 'label-success',
				'fail' => 'label-important',
				'canceled' => 'label-inverse'
			);
			
			return $s2c[$status];
		}
		
		//TODO: merge with grabbing code for print jobs.
		public function grab($uid)
		{
		  if ($this->get('status') == 'available')
		  {
        $this->set('status', 'slicing');
        $this->set('taken_date', date('Y-m-d H:i:s'));
        $this->set('uid', $uid);
        $this->save();
        
  			usleep(1000 + mt_rand(100,500));

  			$sj = new SliceJob($this->id);
  			if ($sj->get('uid') != $uid)
  				throw new Exception("Unable to lock slice job #{$this->id}");        

        $bot = $this->getBot();
        $bot->set('status', 'slicing');
        $bot->save();
		  }
		}
		
		//TODO: merge with code for printing
		public function fail()
		{
		  $this->set('status', 'failure');
		  $this->save();
		  
      $job = $this->getJob();
      $job->set('downloaded_time', date("Y-m-d H:i:s"));
      $job->set('finished_time', date("Y-m-d H:i:s"));
      $job->set('verified_time', date("Y-m-d H:i:s"));
		  $job->set('status', 'failure');
		  $job->save();

      $bot = $this->getBot();
			$bot->set('job_id', 0);
			$bot->set('status', 'idle');
			$bot->save();
			
			$log = new ErrorLog();
			$log->set('user_id', User::$me->id);
			$log->set('job_id', $job->id);
			$log->set('bot_id', $bot->id);
			$log->set('queue_id', $job->get('queue_id'));
			$log->set('reason', "Model slicing failed.");
			$log->set('error_date', date("Y-m-d H:i:s"));
			$log->save();
		}
		
		//todo: merge with code for printing
		public function pass()
		{
		  $this->set('status', 'complete');
		  $this->save();
		  
		  $job = $this->getJob();
      $job->set('status', 'taken');
      $job->save();

      $bot = $this->getBot();
			$bot->set('status', 'working');
			$bot->save();
		}
	}
?>