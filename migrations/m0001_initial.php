<?php

use thecodeholic\phpmvc\Application;

/**
 * User: TheCodeholic
 * Date: 7/10/2020
 * Time: 8:07 AM
 */

class m0001_initial {
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "create table if not exists php_mvc.users
                (
                    id         int auto_increment
                        primary key,
                    email      varchar(255)                          not null,
                    username   varchar(255)                          not null,
                    created_at timestamp default current_timestamp() not null,
                    password   varchar(512)                          not null
                );
                create table php_mvc.userDetails
                (
                    firstname    varchar(255)                          not null,
                    lastname     varchar(255)                          not null,
                    jobTitle     varchar(255)                          not null,
                    profileImage mediumblob                            null,
                    dob          date      default '1900-01-01'        null,
                    phoneNumber  varchar(20)                           not null,
                    created_at   timestamp default current_timestamp() not null,
                    username     varchar(255)                          not null
                        primary key,
                    address      varchar(255)                          null
                );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE php_mvc.users; DROP TABLE php_mvc.userDetails;";
        $db->pdo->exec($SQL);
    }
}