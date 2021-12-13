<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/16/2017
 * Time: 10:40 ص
 */
$MA_Css       = 'MA-Includes/MA-Assets/MA-Css/';    // Template Files Css Directory
$MA_Js        = 'MA-Includes/MA-Assets/MA-Js/';     // Template Files Js Directory
$MA_Img       = 'MA-Includes/MA-Assets/MA-Img/';    // Template Files Images Directory
$MA_Temp      = 'MA-Content/MA-UserTemplate/';      // Template Files Directory
$MA_Func      = 'MA-Content/MA-Functions/';         // Template Files Functions Directory
$MA_Classes   = 'MA-Content/MA-Classes/';           // Template Files ClassesDirectory
$MA_url_R     = 'http://' . @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'];          // This Variable For Get url Who This User Is Coming From It

date_default_timezone_set("Africa/Cairo");          // This Method For SetUp Time Zone To Egypt Time Zone

require_once $MA_Classes . "MA-Connection.php";
require_once $MA_Classes . "MA_User_Profile.php";
require_once "MA-Includes/MA-Pages-Error/MA-Page-Error.php";
require_once "MA-Content/index.php";
include_once "MA-Content/MA-Classes-Trigger.php";
include_once $MA_Func    . "MA-Functions.php";
include_once $MA_Temp    . "MA-Header.php";

$MA_TRIGGER_USER_CLASS = new MA_User_Profile();
$MA_CONNECTION_INIT = new MA_Connection('arabic');
$MA_PAGE_ERROR = new MA_Page_Error();
$MA_CHECK_USER_PROFILE = $MA_TRIGGER_USER_CLASS->MA_URL();

if (@$_SESSION['MA_USER_ARABIC_SESSION_ID'] == null){
    $MA_SET_SESSION_ID = $MA_CONNECTION_INIT->MA_SQL_QUERY("SELECT * FROM users WHERE Username = ?",true,array(@$_SESSION['MA_USER_ARABIC_SESSION']),null,null);
    @$_SESSION['MA_USER_ARABIC_SESSION_ID'] = $MA_SET_SESSION_ID['UserId'];
}
if (isset($MA_CHECK_USER_PROFILE[2])) {

}
// Array[0] == Host Name
// Array[1] == Script Name. When The Site Run On Online Server Value of The Array[1] == MA-Profile File

$MA_USER_SELECTED_PROFILE = $MA_CONNECTION_INIT->MA_SQL_QUERY("SELECT * FROM users WHERE Username = ?", true, array($MA_CHECK_USER_PROFILE[2]), null, null);
if ($MA_CHECK_USER_PROFILE[2] == $MA_USER_SELECTED_PROFILE['UserPermLink']){
    include "MA-Profile.php";
} elseif($MA_CHECK_USER_PROFILE[2] == "MA-Means"){
    require_once "MA-Means.php";
}elseif($MA_CHECK_USER_PROFILE[2] == "MA-Means"){

}elseif($MA_CHECK_USER_PROFILE[2] == "MA-Means"){

} elseif($MA_CHECK_USER_PROFILE[2] == "index"){

}elseif($MA_CHECK_USER_PROFILE[2] == "login"){
    require_once "login.php";
} else{
    $MA_PAGE_ERROR->PageNotFound();
}