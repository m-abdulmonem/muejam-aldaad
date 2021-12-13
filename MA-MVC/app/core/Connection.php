<?php

/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/13/2017
 * Time: 04:54 م
 */
class Connection
{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $pdo;


    /*
    public function connecting($db_host = "127.0.0.1", $db_user = "root", $db_pass = "", $db_name, $db_pdo = null){
        $con = new PDO($dsn, $user, $pass, $option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    */

    public function __construct($db_name = "arabic", $db_host = 'localhost', $db_user = 'root', $db_pass = '') {
        $this->db_host = $db_host = "localhost";
        $this->db_user = $db_user = "root";
        $this->db_pass = $db_pass = "";
        $this->db_name = $db_name = "arabic";
    }

    public function getPDO(){
     try{
         if($this->pdo === null) {
             $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $pdo->query('SET names utf8; SET CHARACTER SET utf8');
             $this->pdo = $pdo;
         }
        return "<br/>Successful Create Connection<br/>";
     }catch (Exception $e){
         echo "Field To create Connect";
     }
        return $this->pdo;
    }
    public function query($statement, $one = false, $class = null){
        $rs = $this->getPDO()->query($statement);
        if(
            strpos(strtolower($statement), 'INSERT') === 0 ||
            strpos(strtolower($statement), 'DELETE') === 0 ||
            strpos(strtolower($statement), 'UPDATE') === 0
        ){
            return $rs;
        }
        if($class === null){
            $rs->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $rs->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        if($one){
            if($one === 'muti_insert')
                $data = $rs->rowCount();
            else
                $data = $rs->fetch();

        } else {
            $data = $rs->fetchAll();
        }
        return $data;
    }



    public function prepare($statement, $attributes, $one = false, $class = null){
        $rs = $this->getPDO()->prepare($statement);
        $rst = $rs->execute(array($attributes));
        if(
            strpos(strtolower($statement), 'insert') === 0 ||
            strpos(strtolower($statement), 'delete') === 0 ||
            strpos(strtolower($statement), 'update') === 0
        ){
            return $rst;
        }
        if ($class === null){
            $rs->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $rs->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        if($one){
            $data = $rs->fetch();
        } else {
            $data = $rs->fetchAll();
        }
        return $data;
    }


}

$con = new Connection();
$joker = $con->getPDO()->prepare("SELECT * FROM users");
$joker->execute();
$jokers = $joker->fetchAll();
foreach ($jokers as $user){
    echo $user['Username'];
}