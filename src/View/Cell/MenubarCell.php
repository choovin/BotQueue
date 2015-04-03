<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Menubar cell
 */
class MenubarCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @param \App\Model\Entity\User $user
     */
    public function display($user)
    {
	    $this->set('area', '');
        $this->set('user', $user);
    }
}
