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

	class SubJob extends Model
	{
	  public function __construct($id = null, $table = null)
		{
			parent::__construct($id, $table);
		}
		
		public function getMetaJob()
		{
		  return new MetaJob($this->get('metajob_id'));
    }
    
    public function getName()
		{
			return "#" . str_pad($this->get('metajob_id'), 4, "0", STR_PAD_LEFT) . '.' . str_pad($this->id, 4, "0", STR_PAD_LEFT);
		}
		
		public function getUrl()
		{
		  return "/metajob:" . $this->get('metajob_id');
		}
		
		public function getAPIData()
		{
			$r = array();
			$r['id'] = $this->id;
			$r['metajob_id'] = $this->get('metajob_id');
			$r['name'] = $this->getName();

			return $r;
		}
		
		public function getStatusHTML($status = null)
		{
		  return $this->getMetaJob()->getStatusHTML($status);
		}
	}
?>