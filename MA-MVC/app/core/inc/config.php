<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dsn    = 'mysql:host=localhost;dbname=arabic';
$user   = 'root';
$pass   = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8',
);

try{
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e){
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