<?php


session_start();
ob_start();
unset($_SESSION['MA_USER_ARABIC_SESSION'],$_SESSION['MA_USER_ARABIC_SESSION_ID']);
//session_unset();
//session_destroy();
if (empty($_GET['Url_Redirect'])){
header("Location: MA-sign-in.php");
} else {
header("Location: MA-sign-in.php?Url_Redirect=" . $_GET['Url_Redirect']);
}
ob_end_flush();
exit();
