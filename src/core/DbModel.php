<?php

namespace notas\src\core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save() 
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn($att) => ":{$att}", $attributes);
        
        $sql = "INSERT INTO {$tableName}  
            (".implode(',',$attributes).") 
            VALUES (".implode(',',$params).")";
        $statement = self::prepare($sql);

        foreach($attributes as $attribute) {
            $statement->bindValue(":{$attribute}", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public static function prepare(string $sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
