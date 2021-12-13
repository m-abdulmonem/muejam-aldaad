<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$session_user_arabic     = $_SESSION['user_arabic_app'];
$dir_inc_temp_assets_css = '../app/core/inc/template/assets/css/'; //Template Files Css Directory
$dir_inc_temp_assets_js  = '../app/core/inc/template/assets/js/'; //Template Files Js Directory
$dir_inc_temp_assets_img = '../app/core/inc/template/assets/images/'; //Template Files Images Directory
$dir_inc_template        = '../app/core/inc/template/'; // Template Files Directory
$dir_inc_func            = '../app/core/inc/functions/'; // Template Files Functions Directory
$dir_inc_classes         = '../app/core/inc/classes/'; // Template Files ClassesDirectory

@$url_redirect            = @$_SERVER['HTTP_REFERER']; //This Variable For Get url Who This User Is Coming From It

date_default_timezone_set("Africa/Cairo"); // This Method For SetUp Time Zone To Egypt Time Zone

include_once '../app/core/inc/config.php';
include_once $dir_inc_func     . 'function.php';
include_once $dir_inc_template . 'header.php';

