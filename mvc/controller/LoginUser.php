<?php
require_once('DataBase.php');
use DataBase;
class LoginUser {
  private $table_name='users';

  public function __constructor($db){
    $this->conn=$db;
  }

    public function anyIndex() {
        echo "PAGE - ANY index";
    }

    public function postUser(){
      $connexion=new DataBase;
      $connexion->getConnection();
      $query1 = "SELECT * FROM `apilaravel`.`users`;";
      $stmt = $connexion->conn->prepare($query1);
      		$data1=$stmt->execute();
      		echo $stmt->rowCount();
    }
}
