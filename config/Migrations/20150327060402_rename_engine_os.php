<?php
use Phinx\Migration\AbstractMigration;

class RenameEngineOS extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
	    $table = $this->table('engine_os');
	    $table->rename('engine_operating_systems');
    }

	public function down()
	{
		$table = $this->table('engine_operating_systems');
		$table->rename('engine_os');
	}
}
