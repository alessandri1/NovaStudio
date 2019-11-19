<?php
  class Base {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
      $opciones = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
      );

      try {
        $this->dbh = new PDO($dsn, $this->user, $this->password, $opciones);
        // dealing with special characters
        $this->dbh->exec('set names utf8');
      } catch(PDOException $e) {
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    // The Query is prepared
    public function query($query) {
      $this->stmt = $this->dbh->prepare($query);
    }

    // The query is binded
    public function bind($parametro, $valor, $tipo = null) {
      if(is_null($tipo)) {
        switch (true) {
          case is_int($valor):
            $tipo = PDO::PARAM_INT;
            break;
          case is_bool($valor):
            $tipo = PDO::PARAM_BOOL;
            break;
          case is_null($valor):
            $tipo = PDO::PARAM_NULL;
          
          default:
            $tipo = PDO::PARAM_STR;
            break;
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
      }
    }

    // Execute the query
    public function execute() {
      return $this->stmt->execute();
    }

    // Fetch the registers
    public function registros() {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function lastId() {
      $this->query("SELECT LAST_INSERT_ID() as id");
      $this->execute();
      $lastId = $this->registro();
      return $lastId;
    }

    // Fetch the register
    public function registro() {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Fetch the length of row
    public function rowCount() {
      $this->execute();
      return $this->stmt->rowCount();
    }
  }
  
?>