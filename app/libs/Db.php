<?php

/**
 *
 */
class Db
{
  private $host=DB_HOST;
  private $user=DB_USER;
  private $dbname=DB_NAME;
  private $dbpwd=DB_PASS;

  private $stmt;
  private $dbh;
  private $error;

  public function __construct(){
      $dsn='mysql:host='.$this->host. ';dbname='.$this->dbname;
      $options=array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );


      try {
        $this->dbh=new PDO($dsn,$this->user,$this->dbpwd,$options);
      } catch (PDOException $e) {
        $this->error=$e->getMessage();
        echo $this->error;
      }

  }

  public function query($sql){
    $this->stmt=$this->dbh->prepare($sql);

  }

  //bind parameters

  public function bind($params,$values,$type=NULL){
    if (is_null($type)) {
      switch (true) {
        case is_int($values):
          $type=PDO::PARAM_INT;
          break;
        case is_bool($values):
          $type=PDO::PARAM_BOOL;
          break;
        case is_null($values):
          $type=PDO::PARAM_NULL;
          break;

        default:
          $type=PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($params,$values,$type);
  }

  public function execute(){
    return $this->stmt->execute();
  }

  public function resultset(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function rowCount(){
    return $this->stmt->rowCount();
  }


}
