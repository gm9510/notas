<?php

class m0002_add_password_column
{
    public function up() {
        $db = \notas\src\core\Application::$app->db;
        $sql = "ALTER TABLE users  ADD COLUMN password VARCHAR(512) NOT NULL;"; 
        $db->pdo->exec($sql);
    }

    public function down() {
        $db = \notas\src\core\Application::$app->db;
        $sql = "ALTER TABLE users DROP COLUMN password;"; 
        $db->pdo->exec($sql);
    }
}
