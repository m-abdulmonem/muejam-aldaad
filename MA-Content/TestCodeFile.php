<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/21/2017
 * Time: 10:26 ص
 */
// Silence is golden.
require 'MA-Classes/MA-Connection.php';

$MA_Con = new MA_Connection('arabic');
//$MA_Con->MA_TEST_METHOD_SELECT();
$MA_Count = $MA_Con->MA_SQL_QUERY('SELECT Username FROM users ',false,null,false,null);
//$MA_Con->MA_TEST_METHOD_SELECT();

foreach ($MA_Count as $MA){
    echo $MA['Username'] ."<br />";
}

if (
    ($MA_CHECK_USER_PROFILE[1] == "MA-Profile") or
    ($MA_CHECK_USER_PROFILE[1] == "ArabicApp")  or
    ($MA_CHECK_USER_PROFILE[2] == "MA-Profile"))
{
include "MA-Profile.php";
}
