<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Entity\EngineOperatingSystem;
use App\Model\Table\EngineOperatingSystemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EngineOperatingSystemsTable Test Case
 */
class EngineOperatingSystemsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'EngineOperatingSystems' => 'app.engine_operating_systems',
        //'Engines' => 'app.engines'
    ];

	private $EngineOperatingSystems;

	/**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EngineOperatingSystems') ? [] : ['className' => 'App\Model\Table\EngineOperatingSystemsTable'];
        $this->EngineOperatingSystems = TableRegistry::get('EngineOperatingSystems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EngineOperatingSystems);

        parent::tearDown();
    }

    public function testFindByOS()
    {
	    /** @var \Cake\Orm\Query $result */
	    $result = $this->EngineOperatingSystems->findByOperatingSystem(EngineOperatingSystem::OSX);
	    $expected = [
		    [
			    'engine_id' => 1,
			    'operating_system' => EngineOperatingSystem::OSX
		    ],
		    [
			    'engine_id' => 2,
			    'operating_system' => EngineOperatingSystem::OSX
		    ]
	    ];

	    $actual = $result->hydrate(false)->toArray();
	    $this->assertEquals($expected, $actual);
    }

	public function testFindByEngine()
	{
		/** @var \Cake\Orm\Query $result */
		$result = $this->EngineOperatingSystems->findByEngineId(1);
		$expected = [
			[
				'engine_id' => 1,
				'operating_system' => EngineOperatingSystem::OSX
			],
			[
				'engine_id' => 1,
				'operating_system' => EngineOperatingSystem::LINUX
			]
		];

		$actual = $result->hydrate(false)->toArray();
		$this->assertEquals($expected, $actual);
	}
}
