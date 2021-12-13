<?php

/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/13/2017
 * Time: 04:54 م
 */
class MA_Connection
{
    private $MA_DATABASE_HOST = "localhost";
    private $MA_DATABASE_USER = "root";
    private $MA_DATABASE_PASS = "";
    private $MA_DATABASE_NAME = "arabic";
    public $MA_COUNT;

    // $MA_DATABASE_HOST = 'localhost',$MA_DATABASE_USER = 'root',$MA_DATABASE_PASS = '',$MA_DATABASE_NAME
    public function __construct($MA_DATABASE_NAME,$MA_DATABASE_HOST = 'localhost',$MA_DATABASE_USER = 'root',$MA_DATABASE_PASS = '')
    {
        $this->MA_DATABASE_HOST = $MA_DATABASE_HOST;
        $this->MA_DATABASE_USER = $MA_DATABASE_USER;
        $this->MA_DATABASE_PASS = $MA_DATABASE_PASS;
        $this->MA_DATABASE_NAME = $MA_DATABASE_NAME;
    }

    //$MA_DB_Host = "localhost",$MA_DB_NAme = "arabic",$MA_DB_User = "root",$MA_DB_Pass = ""
    private function MA_Connection()
    {
        $dsn = 'mysql:host=' . $this->MA_DATABASE_HOST . ';dbname=' . $this->MA_DATABASE_NAME;
        $user = $this->MA_DATABASE_USER;
        $pass = $this->MA_DATABASE_PASS;
        $option = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        try {
            $con = new PDO($dsn, $user, $pass, $option);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con; // variable
        } catch (PDOException $e) {
            $this->MA_MYSQL_CONNECTION_ERROR();
        }
    }

    public function MA_TEST_METHOD_SELECT()
    {
        $stmt = $this->MA_Connection()->prepare("SELECT * FROM users");
        $stmt->execute();
        $Users = $stmt->fetchAll();
        foreach ($Users as $user) {
            echo $user['Username'] . "<br />";
        }
    }

    public function MA_SQL_QUERY($MA_SQL_Query, $MA_W = false, $array = null, $MA_Update = null, $MA_One = null)
    {
        if ($MA_W == false) {
            $stmt = $this->MA_Connection()->prepare($MA_SQL_Query);
            $stmt->execute();
        } else {
            $stmt = $this->MA_Connection()->prepare($MA_SQL_Query);
            $stmt->execute($array);
        }
        if ($MA_Update == null) {
            if ($MA_One == null) {
                $data = $stmt->fetch();
                return $data;
            } else {
                $data = $stmt->fetchAll();
                return $data;
            }
        } else{
           $MA_ROW_COUNT = $stmt->rowCount();
            return $MA_ROW_COUNT;
        }
    }

    /**
     * @param string $MA_DATABASE_NAME
     */
    public function setMADATABASENAME($MA_DATABASE_NAME)
    {
        $this->MA_DATABASE_NAME = $MA_DATABASE_NAME;

    }
    public function MA_INSERT_DATA($MA_SQL_Query,$array){
        $stmt = $this->MA_Connection()->prepare($MA_SQL_Query);
        $stmt->execute($array);
        $MA_COUNT = $stmt->rowCount();
        return $MA_COUNT;
    }
    public function MA_MYSQL_CONNECTION_ERROR(){
        ?>
        <center>
            <style>
                body{
                    font-family: Cairo;
                    background: #ecf0f5;
                }
                @media (min-width: 768px){
                    .background-white {
                        width: 56%;
                    }
                    .margin-right{
                        margin-right: -525px;
                    }
                }

                .background-white{
                    background: #fff;
                    text-align: right;
                    padding: 25px;
                    margin-bottom: 10px;
                }
                .background-white h1{
                    border-bottom: 1px solid #c5c5c5;
                    padding-bottom: 10px;
                    font-size: 30px;
                }
                #logo-Install img {
                    margin-top: 10px;
                    width: 132px;
                    height: 136px;
                }

            </style>
            <div class="container">
                <?php
                $server = $_SERVER['SCRIPT_NAME'];
                if ($server == '/install/index.php'){
                    ?>
                    <p>
                        <img style="height: 150px; width: 150px" src="../ma-cp/layouts/img/onlinelogomaker-090116-0038-6979.png">
                    </p>
                    <?php
                } elseif ($server == 'index.php'){
                    ?>
                    <p>
                        <img style="height: 150px; width: 150px" src="../ma-cp/layouts/img/onlinelogomaker-090116-0038-6979.png">
                    </p>
                    <?php
                } elseif ($server == '/adminPanel/login.php'){
                    ?>
                    <p>
                        <img style="height: 150px; width: 150px" src="../ma-cp/layouts/img/onlinelogomaker-090116-0038-6979.png">
                    </p>
                    <?php
                } elseif ($server == '/adminPanel/index.php'){
                    ?>
                    <p>
                        <img style="height: 150px; width: 150px" src="../ma-cp/layouts/img/onlinelogomaker-090116-0038-6979.png">
                    </p>
                    <?php
                } elseif ($server == '/adminPanel'){
                    ?>
                    <p>
                        <img style="height: 150px; width: 150px" src="../ma-cp/layouts/img/onlinelogomaker-090116-0038-6979.png">
                    </p>
                    <?php
                } elseif ($server == '/arabic-oop') {
                    ?>
                    <p>
                        <img style="height: 150px; width: 150px" src="../ma-cp/layouts/img/onlinelogomaker-090116-0038-6979.png">
                    </p>
                    <?php
                }
                ?>
                <div class="background-white">
                    <h1>خطأ فى الاتصال بقاعدة البيانات</h1>
                    <p>
                        تحقق من ملف <code>config.php</code>
                    </p>
                </div>
            </div>
        </center>
        <?php
        exit();
    }
}
