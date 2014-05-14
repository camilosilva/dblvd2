<?php

//----------------------------
// DATABASE CONFIGURATION
//----------------------------

/*

Valid types (adapters) are Postgres & MySQL:

'type' must be one of: 'pgsql' or 'mysql'

*/

return array(
        'db' => array(
                'development' => array(
                        'type'      => 'mysql',
                        'host'      => 'localhost',
                        'port'      => 3306,
                        'database'  => 'dadblvd',
                        'user'      => 'root',
                        'password'  => 'loc@ltest123',
                        //'charset' => 'utf8',
                        //'directory' => 'custom_name',
                        //'socket' => '/var/run/mysqld/mysqld.sock'
                ),

                'pg_test'  => array(
                        'type'  => 'pgsql',
                        'host'  => 'localhost',
                        'port'  => 5432,
                        'database'  => 'ruckusing_migrations_test',
                        'user'  => 'postgres',
                        'password'  => '',
                        //'directory' => 'custom_name',

                ),

                'mysql_test'  => array(
                        'type'  => 'mysql',
                        'host'  => 'localhost',
                        'port'  => 3306,
                        'database'  => 'ruckusing_migrations_test',
                        'user'  => 'root',
                        'password'  => '',
                        //'directory' => 'custom_name',
                        //'socket' => '/var/run/mysqld/mysqld.sock'
                )

        ),

        'migrations_dir' => array('default' => MIGRATIONS),

        'db_dir' => MIGRATIONS . DS . 'db',

        'log_dir' => MIGRATIONS . DS . 'log',

        'ruckusing_base' => VENDOR . DS . 'ruckusing' . DS . 'ruckusing-migrations'

);
