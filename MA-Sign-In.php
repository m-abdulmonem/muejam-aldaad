<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 01/29/2017
 * Time: 11:22 م
 */

ob_start();
@session_start();
$MA_Url_Return  = @$_GET['Url_Redirect'];
$MA_Get_User    = @$_POST['user'];
$MA_Get_Pass    = @sha1($_POST['pass']);

if (!isset($_SESSION['MA_USER_ARABIC_SESSION'])) {
    include_once "MA-init.php";
    $MA_Connection = new MA_Connection('arabic');
    ?>
    <div class="wrapper-page">
        <div class=" card-box" id="card-box" style="border-top: none!important;">
            <div class="panel-heading">
                <h3 class="text-center"> تسجيل الدخول <strong class="text-custom" style="float: none">لحسابك</strong>
                </h3>
            </div>

            <div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $MA_Validate_User = $MA_Connection->MA_SQL_QUERY("SELECT * FROM users WHERE Username = ?",true,array($MA_Get_User),null,null);

                    $MA_Errors_Array = array();
                    if (empty($MA_Get_User)){
                        $MA_Errors_Array[] = "عفوا لايجب ترك اسم المستخدم فارغا";
                        if (empty($MA_Get_Pass)){
                            $MA_Errors_Array[] = "عفوا لايجب ترك كلمة المرور فارغة";
                        }
                    } else {
                        if ($MA_Get_User != $MA_Validate_User['Username']) {
                            $MA_Errors_Array[] = "عفوا اسم المستخدم غير صحيح";
                        } else {
                            $MA_Validate_Pass = $MA_Connection->MA_SQL_QUERY("SELECT * FROM users WHERE Username = ?",true,array($MA_Get_User),null,null);
                            if ($MA_Get_Pass != $MA_Validate_Pass['Password']) {
                                $MA_Errors_Array[] = "عفوا كلمة المرور الخاصة ب" . $MA_Get_User . "غير صحيحة";
                            }
                        }
                        if (empty($MA_Get_Pass)) {
                            $MA_Errors_Array[] = "عفوا لايجب ترك كلمة المرور فارغة";
                        }
                    }

                    if (empty($MA_Errors_Array)) {
                        $_SESSION['MA_USER_ARABIC_SESSION'] = $MA_Get_User;
                        $_SESSION['MA_USER_ARABIC_SESSION_ID'] = $MA_Validate_User['UserId'];
                        if ((empty($MA_Url_Return)) or (!isset($MA_Url_Return))) {
                            header("Location: index.php");
                        } else {
                            header("Location: " . $MA_Url_Return);
                        }
                        exit();
                    } else {
                        foreach ($MA_Errors_Array as $MA_Error_Array) {
                            echo "<div class='ma ma-danger'>" . $MA_Error_Array . "</div>";
                        }
                    }
                }
                ?>
            </div>

            <div class="panel-body">
                <form class="form-horizontal m-t-20" action="MA-Sign-In.php" method="post">

                    <div class="form-group ">
                        <p class="user-error"></p>
                        <div class="col-xs-12">
                            <input
                                class="form-control"
                                id="user"
                                type="text"
                                name="user"
                                required="required"
                                placeholder="اسم المستخدم"
                                onkeyup="validate('user','user-error','username')">
                        </div>
                    </div>

                    <div class="form-group">
                        <p id="pass-error"></p>
                        <div class="col-xs-12">
                            <input
                                class="form-control"
                                id="pass"
                                type="password"
                                name="pass"
                                required="required"
                                onkeyup="validate('pass','pass-error','password')"
                                placeholder="كلمة المرور">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    تذكرنى
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                    type="submit">تسجيل الدخول
                            </button>
                        </div>
                    </div>

                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12">
                            <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> هل نسيت
                                كلمة المرور؟</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>انت لاتمتلك حساب؟ <a href="MA-Sign-Up.php" class="text-primary m-l-5"><b>تسجيل جديد</b></a></p>

            </div>
        </div>
    </div>
    <?php
    include_once $MA_Temp . "MA-Footer.php";
}else{
    if ((empty($MA_Url_Return)) or (!isset($MA_Url_Return))) {
        header("Location: index.php");
    } else {
        header("Location: " . $MA_Url_Return);
    }
    exit();
}
ob_end_flush();