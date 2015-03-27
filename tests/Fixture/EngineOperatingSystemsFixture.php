<?php
namespace App\Test\Fixture;

use App\Model\Entity\EngineOperatingSystem;
use Cake\TestSuite\Fixture\TestFixture;

/**
 * EngineOperatingSystemsFixture
 *
 */
class EngineOperatingSystemsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'engine_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'operating_system' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['engine_id', 'operating_system'], 'length' => []],
        ],
        '_options' => [
'engine' => 'InnoDB', 'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
	public $records = [
		[
			'engine_id' => 1,
			'operating_system' => EngineOperatingSystem::OSX
		],
		[
			'engine_id' => 1,
			'operating_system' => EngineOperatingSystem::LINUX
		],
		[
			'engine_id' => 2,
			'operating_system' => EngineOperatingSystem::OSX
		]
	];
}
