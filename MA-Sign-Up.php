<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 01/30/2017
 * Time: 09:50 ص
 */
@session_start();
ob_start();
$URL_REDIRECT      = @$_GET['Url_Redirect'];
$MA_USERNAME       = @$_POST['username'];
$MA_PASSWORD       = @$_POST['pass'];
$MA_RE_PASSWORD    = @$_POST['rePass'];
$MA_HASH_PASSWORD  = @sha1($MA_PASSWORD);
$MA_EMAIL          = @$_POST['email'];
$MA_FULL_NAME      = @$_POST['full'];
$MA_CODE_RAND      = @rand(111111, 999999);
$MA_CODE_RAND_HASH = @md5($MA_CODE_RAND);
$MA_USER_IP        = @$_SERVER['REMOTE_ADDR'];
$MA_SEX            = @$_POST['sex'];
$MA_BIRTH_DAY      = @$_POST['day'];
$MA_BIRTH_MONTH    = @$_POST['month'];
$MA_BIRTH_YEAR     = @$_POST['year'];
$MA_BIRTH_DATE     = @$MA_BIRTH_DAY . '-' . @$MA_BIRTH_MONTH . '-' . @$MA_BIRTH_YEAR;

if (!isset($_SESSION['MA_USER_ARABIC_SESSION'])) {
    include "MA-init.php";
    $MA_CONNECTION = new MA_Connection('arabic');
    $MA_IMMEDIATELY_YEAR  = date('Y');
    $MA_USER_AGE = $MA_IMMEDIATELY_YEAR  - $MA_BIRTH_YEAR;

    ?>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> تسجيل <strong class="text-custom" style="float: none;">حساب</strong>جديد </h3>
            </div>

            <div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") { // isset($_POST['signUp'])
                    $MA_CHECK_OF_USER = $MA_CONNECTION->MA_SQL_QUERY("SELECT Username,Email FROM users WHERE Username = ? OR Email = ?",true,array($MA_USERNAME,$MA_EMAIL),true,null);
                    $MA_USER_SELECTED  = $MA_CHECK_OF_USER['Username'];
                    $MA_EMAIL_SELECTED = $MA_CHECK_OF_USER['Email'];

                    $errors = array();
                    if (strlen($MA_USERNAME) < 4){
                        $errors[] = "عفوا يجب ان يكون اسم المستخدم 4 حروف على الاقل";
                    }
                    if (empty($MA_USERNAME)){
                        $error[] = "عفوا لايجب ترك اسم المستخدم فارغا";
                    }
                    if ($MA_USERNAME == $MA_USER_SELECTED){
                        $errors[]= "عفوا هذا المستخدم موجود مسبقا";
                    }
                    if ($MA_EMAIL == $MA_EMAIL_SELECTED){
                        $errors[] = "عفوا هذا الايميل موجود مسبقا";
                    }
                    if (!filter_var($MA_EMAIL, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "عفوا صيفة البريد الالكترونى غير صحيحة";
                    }
                    if (strlen($MA_PASSWORD) < 6){
                        $errors[] = "عفوا لابد ان تكون كلمة المرور من 6 احرف على الاقل";
                    }
                    if (empty($MA_PASSWORD)){
                        $errors[] = "عفوا لايجب ترك كلمة المرور فارغة";
                    }
                    /*
                    if ($MA_RE_PASSWORD != $MA_PASSWORD){
                        $errors[] = "عفوا كلمة المرور غير متطابقة";
                    }
                    */
                    if (empty($MA_BIRTH_DAY)){
                        $errors[] = "عفوا يجب اختيار يوم ميلادك";
                    }
                    if (empty($MA_BIRTH_MONTH)){
                        $errors[] = "عفوا يجب اختيار شهر ميلادك";
                    }
                    if (empty($MA_BIRTH_YEAR)){
                        $errors[] = "عفوا يجب اختيار سنة ميلادك";
                    }

                    if (empty($errors)) {
                        $MA_INSERT_NEW_USER_QUERY = "INSERT INTO  users(Username, Password, Email, Fullname, CodeChanagePass, UserIp, UserAge, UserBirthDate, UserSex, regdate, power, UserPermLink) VALUES(:zUser, :zPass, :zMail, :zName, :zCode, :zIpA, :zAge, :zDate, :zSex, now(), :zPower, :zUserPermLink)";
                        $MA_INSERT_NEW_USER_ARRAY = array('zUser' => $MA_USERNAME, 'zPass' => $MA_HASH_PASSWORD, 'zMail' => $MA_EMAIL, 'zName' => $MA_FULL_NAME, 'zCode' => $MA_CODE_RAND_HASH, 'zIpA' => $MA_USER_IP, 'zAge' => $MA_USER_AGE, 'zDate' => $MA_BIRTH_DATE, 'zSex' => $MA_SEX, 'zPower' => 0, 'zUserPermLink' => $MA_USERNAME);
                        $MA_INSERT_NEW_USER = $MA_CONNECTION->MA_SQL_QUERY($MA_INSERT_NEW_USER_QUERY,true,$MA_INSERT_NEW_USER_ARRAY,'Insert');
                        if ($MA_INSERT_NEW_USER > 0){
                            $_SESSION['MA_USER_ARABIC_SESSION']    = $MA_USERNAME;
                            $_SESSION['MA_USER_ARABIC_SESSION_ID'] = null;
                            if (empty($URL_REDIRECT)){
                                header("Location: index.php");
                            } else{
                                header("Location: " . $URL_REDIRECT);
                            }
                            exit();
                        } else {
                            echo '<div class="ma ma-danger width">عفوا فشل انشاء حساب جديد</div>';
                            if (empty($URL_REDIRECT)){
                                header("Location: index.php");
                            } else{
                                header("Location: " . $URL_REDIRECT);
                            }
                            exit();
                        }

                    } else {
                        foreach ($errors as $error) {
                            echo "<center><div class='ma ma-danger width'>$error</div></center>";
                        }
                    }
                }
                ?>
            </div>

            <div class="panel-body">
                <form class="form-horizontal m-t-20" action="MA-Sign-Up.php" method="post">
                    <div class="form-group ">
                        <p id="full-error"></p>
                        <div class="col-xs-12">
                            <input
                                class="form-control"
                                name="full"
                                id="name"
                                type="text"
                                required=""
                                placeholder="الاسم كامل">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="email" required="" placeholder="البريد الالكترونى">
                        </div>
                    </div>

                    <div class="form-group ">
                        <p id="user-error"></p>
                        <div class="col-xs-12">
                            <input
                                class="form-control"
                                name="username"
                                id="user"
                                type="text"
                                required=""
                                placeholder="اسم المستخدم"
                                onkeyup="validate('user','user-error','username')">
                        </div>
                    </div>

                    <div class="form-group">
                        <p id="errorPass"></p>
                        <div class="col-xs-12">
                            <input
                                class="form-control"
                                id="pass"
                                type="password"
                                name="pass"
                                required=""
                                placeholder="كلمة المرور"
                                onkeyup="validate('pass','errorPass','password');">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input
                                class="form-control"
                                id="rePass"
                                onkeyup="identicalPass()"
                                type="password"
                                name="rePass"
                                required=""
                                placeholder="إعادة كلمة المرور">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <select class="form-control" required name="sex">
                                <option>اختار الجنس</option>
                                <option value="0">ذكر</option>
                                <option value="1">انثى</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" style="margin-right: 10px"> تاريخ الميلاد </label>
                        <div class="col-xs-12" style=" display: flex">
                            <select class="form-control col-xs-3" id="date" required
                                    style="width: 31%;margin-left: 12px;" name="day">
                                <option>اليوم</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                }
                                ?>
                            </select>
                            <select class="form-control" required style="width: 31%" name="month">
                                <option>الشهر</option>
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                }
                                ?>
                            </select>
                            <select class="form-control" required style="width: 31%;margin-right: 11px" name="year">
                                <option>السنة</option>
                                <?php
                                for ($i = 1950; $i <= $MA_IMMEDIATELY_YEAR ; $i++) {
                                    echo "<option min='2000' value='" . $i . "'>" . $i . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button
                                class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                type="submit"
                                name="signUp"
                                id="success-alert">تسجيل
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <p>
                    هل انت تمتلك حساب؟<a href="MA-Sign-In.php" class="text-primary m-l-5"><b>تسجيل الدخول</b></a>
                </p>
            </div>
        </div>

    </div>

    <?php

    include $MA_Temp . "MA-Footer.php";
} else {
  if (empty($URL_REDIRECT)){
      header("Location: index.php");
  } else{
      header("Location: " . $URL_REDIRECT);
  }
  exit();
}

ob_end_flush();