<?php
namespace Config;
class Connection{
    static private ?Connection $instance = null;
    private \PDO $connection;
    private string $SQL;
    private array $dbs = [];
    public function addDBConfig(string $name, array $config){
        $this->dbs[$name] = $config;
    }
    private function __construct($nameDb){
        $addConfig = require_once(__DIR__."/config.php");
        $addConfig($this);
        $this->setDB($nameDb);
    }

    private function setDB($nameDB){
        if(!isset($this->dbs[$nameDB]))throw new \Exception("error db not found");
        $this->connection = new \PDO(...($this->dbs[$nameDB] += [
            [\PDO::ATTR_PERSISTENT => false,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci',
            \PDO::ATTR_EMULATE_PREPARES => true]
        ]) );        
    }

    public function setSQL($sql):void{
        $this->SQL = $sql;
    } 

    public function execute(?array $datos):array{
        $stmt = $this->connection->prepare($this->SQL);        
        $status = $stmt->execute($datos);

        $res = $stmt->fetchAll();
        return [
            "status"=>$status,
            "data"=> $res
        ];
    }

    static public function getConnection(?string $nameDB):Connection{
        if(!isset(self::$instance) && !is_null($nameDB)){
            self::$instance = new Connection($nameDB);
        }        
        if(is_null(self::$instance))throw new \Exception("ERROR: UNDEFINED CONNECTION.");
        return self::$instance;
    }
    
}