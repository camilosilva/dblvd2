<?php

class CreateUsersTable extends Ruckusing_Migration_Base
{
    public function up()
    {
        $users = $this->create_table('users', array('options' => 'Engine=InnoDB'));
        $users->column('username', 'string', array('limit'=>64));
        $users->column('password', 'string', array('limit'=>64));
        $users->finish();
    }//up()

    public function down()
    {
        $this->drop_table('users');
    }//down
}
