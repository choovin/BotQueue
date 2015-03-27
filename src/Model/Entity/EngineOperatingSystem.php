<?php
namespace App\Model\Entity;

/**
 * EngineOperatingSystem Entity.
 */
class EngineOperatingSystem extends AppEntity
{
	const OSX = 0;
	const LINUX = 1;
	const WINDOWS = 2;
	const RASPBERRYPI = 3;

	/**
	 * @return mixed
	 */
	public static function operating_systems($value = null) {
		$array = array(
			self::OSX => __('OSX'),
			self::LINUX => __('Linux'),
			self::WINDOWS => __('Windows'),
			self::RASPBERRYPI => __('Raspberry PI')
		);
		return parent::enum($value, $array);
	}

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'engine' => true,
    ];
}
