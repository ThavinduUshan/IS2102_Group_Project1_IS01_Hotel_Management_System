<?php
  class Database{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    public function __construct(){
      $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      try{
        $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
      }catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    //allows to write queires
    public function query($sql){
      $this->statement = $this->dbHandler->prepare($sql);
    }

    //bind values
    public function bind($parameter, $value, $type = null){
      switch(is_null($type)){
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        
        default:
          $type = PDO::PARAM_STR;
      }
      $this->statement->bindValue($parameter, $value, $type);
    }

    public function execute(){
      return $this->statement->execute();
    }

    //return array
    public function resultSet(){
      $this->execute();
      return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    //return single row
    public function single() {
      $this->execute();
      return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    //get the row count
    public function rowcount(){
      return $this->statement->rowCount(); 
    }
  }