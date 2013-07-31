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

	class PrintJob extends Model
	{
		public function __construct($id = null)
		{
			parent::__construct($id, "print_jobs");
		}
		
		public function getName()
		{
			return "#" . str_pad($this->id, 6, "0", STR_PAD_LEFT);
		}
		
		public function getUrl()
		{
		  return "/metajob:" . $this->get('metajob_id');
		}

    //TODO: include driver from bot config
		public function getAPIData()
		{
			$r = array();
			$r['id'] = $this->id;
			$r['metajob_id'] = $this->get('metajob_id');
			$r['name'] = $this->getName();
      $r['file'] = $this->getFile()->getAPIData();
      //$r['driver'] = $this->getBot()->getConfig();

			return $r;
		}
		
		public function getFile()
		{
		  return new S3File($this->get('file_id'));
		}
	}
?>