<?php

class ModifyUsersTable extends Ruckusing_Migration_Base
{
    public function up()
    {
        $this->change_column("users", "password", "string", array('limit' => 128) );
        $this->add_column("users", "roles", "string", array('limit' => 128));
        $this->add_column("users", "created_at", "datetime");
        $this->add_column("users", "updated_at", "datetime");
        $this->execute("INSERT INTO users (username, password, roles, created_at, updated_at) VALUES ('mr.admin','5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==','ROLE_ADMIN', NOW(), NOW())");
        $this->execute("INSERT INTO users (username, password, roles, created_at, updated_at) VALUES ('local','5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==','ROLE_USER', NOW(), NOW())");
    }//up()

    public function down()
    {
    }//down()
}
