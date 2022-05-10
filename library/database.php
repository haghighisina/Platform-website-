<?php
class Database{
    //Properties
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $error;
    private $stmt;

    //constructor
    public function __construct(){
        //Set our Data Source Name (DSN)
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;

        //Set the options
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch (PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    //Database query
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    //Binding the parameters
    public function bindTheParameters($param, $value, $type=null){
        if (is_null($type)){
            $type = match ($type) {
                is_int($value) => $type = PDO::PARAM_INT,
                is_bool($value) => $type = PDO::PARAM_BOOL,
                is_null($value) => $type = PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //execute the query
    public function executeTheQuery(){
        return $this->stmt->execute();
    }

    //get all our result set and fetch them
    public function resultQuery(){
        $this->executeTheQuery();
        $stmt = $this->stmt->fetchAll(PDO::FETCH_OBJ);
        if (false === $stmt){
            return [];
        }
        return $stmt;
    }

    //get just one single row result
    public function getSingleRowQuery(){
        $this->executeTheQuery();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}