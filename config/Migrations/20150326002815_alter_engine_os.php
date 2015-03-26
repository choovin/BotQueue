<?php
use Phinx\Migration\AbstractMigration;

class AlterEngineOs extends AbstractMigration
{

    public function up()
    {
        $table = $this->table('engine_os', ['id' => false, 'primary_key' => ['engine_id', 'os']]);

        $table->addColumn('os_temp', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true
        ]);

        $table->update();

        $this->execute("UPDATE engine_os SET os_temp = 0 WHERE os = 'osx'");
        $this->execute("UPDATE engine_os SET os_temp = 1 WHERE os = 'linux'");
        $this->execute("UPDATE engine_os SET os_temp = 2 WHERE os = 'win'");
        $this->execute("UPDATE engine_os SET os_temp = 3 WHERE os = 'raspberrypi'");

        $this->execute("ALTER TABLE engine_os DROP PRIMARY KEY");

        $table->removeColumn('os');
        $table->renameColumn('os_temp', 'os');

        $table->update();

        $this->execute("ALTER TABLE engine_os ADD PRIMARY KEY(engine_id,os)");
    }

    public function down()
    {
        $table = $this->table('engine_os', ['id' => false, 'primary_key' => ['engine_id', 'os']]);

        $table->addColumn('os_temp', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);

        $table->update();

        $this->execute("UPDATE engine_os SET os_temp = 'osx' WHERE os = 0");
        $this->execute("UPDATE engine_os SET os_temp = 'linux' WHERE os = 1");
        $this->execute("UPDATE engine_os SET os_temp = 'win' WHERE os = 2");
        $this->execute("UPDATE engine_os SET os_temp = 'raspberrypi' WHERE os = 3");

        $this->execute("ALTER TABLE engine_os DROP PRIMARY KEY");

        $table->removeColumn('os');
        $table->renameColumn('os_temp', 'os');

        $table->update();

        $this->execute("ALTER TABLE engine_os ADD PRIMARY KEY(engine_id,os)");
    }
}
