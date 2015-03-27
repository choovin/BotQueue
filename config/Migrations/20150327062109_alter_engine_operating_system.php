<?php
use Phinx\Migration\AbstractMigration;

class AlterEngineOperatingSystem extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('engine_operating_systems');
	    $table->renameColumn('os', 'operating_system');
        $table->update();
    }
}
