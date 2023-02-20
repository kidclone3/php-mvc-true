<?php
/**
 * Created by PhpStorm.
 * User: Delus
 * Date: 19/02/2023
 * Time: 16:22
 */

namespace app\migrations;

use thecodeholic\phpmvc\Application;

class m0003_add_user_details
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "create table userDetails (
                id INT PRIMARY KEY,
                firstname VARCHAR(255) NOT NULL ,
                lastname VARCHAR(255) NOT NULL,
                jobTitle VARCHAR(255) NOT NULL,
                profileImage MEDIUMBLOB,
                dob DATE DEFAULT '1900-01-01 00:00:00',
                phoneNumber VARCHAR(20) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (id) references users(id))
                engine =INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE users_details;";
        $db->pdo->exec($SQL);
    }
}