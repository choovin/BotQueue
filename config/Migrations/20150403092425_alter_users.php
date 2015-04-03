<?php
use Phinx\Migration\AbstractMigration;

class AlterUsers extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table->renameColumn('pass_hash', 'password');
        $table->update();
    }

    public function down()
    {
        $table = $this->table('users');
        $table->renameColumn('password', 'pass_hash');
        $table->update();
    }
}
