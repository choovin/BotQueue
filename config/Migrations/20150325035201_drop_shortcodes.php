<?php
use Phinx\Migration\AbstractMigration;

class DropShortcodes extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('shortcodes');
        if($table->exists()) $table->drop();
    }

    public function down()
    {
        $table = $this->table('shortcodes');
        if (!$this->hasTable('shortcodes')) {
            $table
                ->addColumn('url', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->create();
        }
    }
}
