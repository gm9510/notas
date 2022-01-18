<?php

class m0001_initial
{
    public function up() {
        $db = \notas\src\core\Application::$app->db;
        $SQL = "CREATE TABLE users (
            id SERIAL PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            status SMALLINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP); ";
        $db->pdo->exec($SQL);
    }

    public function down() {

        $db = \notas\src\core\Application::$app->db;
        $SQL = "DELETE TABLE IF EXIST users;";
        $db->pdo->exec($SQL);
    }
}
