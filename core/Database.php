<?php
require_once "Config.php";


class Database{
    public $connection;

    public function __construct(){
        $host = Config::DATABASE_HOST->value;
        $dbname = Config::DATABASE_NAME->value;
        $port = Config::DATABASE_PORT->value;
        $username = Config::DATABASE_USERNAME->value;
        $password = Config::DATABASE_PASSWORD->value;

        $dsn = "mysql:host=$host;dbname=$dbname;user=$username;password=$password;port=$port";
        $this->connection = new PDO($dsn);
    }

    public function query($query){
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
        // return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
