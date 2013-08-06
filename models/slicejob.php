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

	class SliceJob extends SubJob
	{
		public function __construct($id = null)
		{
			parent::__construct($id, "slice_jobs");
		}
		
		public function getAPIData()
		{
			$r = parent::getAPIData();
			
			$r['is_expired'] = $this->get('is_expired');
      $r['input_file'] = $this->getInputFile()->getAPIData();
      $r['output_file'] = $this->getOutputFile()->getAPIData();
      $r['slice_config'] = $this->getSliceConfig()->getAPIData();
      $r['slice_config_snapshot'] = $this->get('slice_config_snapshot');

			return $r;
		}
		
		public function getInputFile()
		{
		  return new S3File($this->get('input_id'));
		}

		public function getOutputFile()
		{
		  return new S3File($this->get('output_id'));
		}
		
		public function getSliceConfig()
		{
		  return new SliceConfig($this->get('slice_config_id'));
		}

		public function getSliceEngine()
		{
		  return $this->getSliceConfig()->getEngine();
		}

		public static function byConfigAndSource($config_id, $source_id)
		{
		  $config_id = (int)$config_id;
		  $source_id = (int)$source_id;
		  
		  $sql = "
		    SELECT sj.id
		    FROM slice_jobs sj
		    INNER JOIN meta_jobs mj
		      ON sj.metajob_id = mj.id
		    WHERE sj.slice_config_id = ".db()->escape($config_id)."
		      AND sj.input_id = ".db()->escape($source_id)."
		      AND mj.status = 'pass'
		      AND sj.is_expired = 0
		  ";
		  
		  $id = db()->getValue($sql);
		  
		  return new SliceJob($id);
		}
		
		public function getStatusHTML()
		{
		  if ($this->get('is_expired'))
		    return parent::getStatusHTML('expired');
		  else
		    return parent::getStatusHTML();
		}
	}
?>