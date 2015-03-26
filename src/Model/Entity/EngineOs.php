<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EngineOs Entity.
 */
class EngineOs extends Entity
{
    const OSX = 0;
    const LINUX = 1;
    const WINDOWS = 2;
    const RASPBERRYPI = 3;

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'engine' => true,
    ];
}
