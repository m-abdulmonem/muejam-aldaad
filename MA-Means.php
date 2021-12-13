<?php include_once "MA-init.php";
$MA_Connection = new MA_Connection('arabic');
@$q = @str_replace('"', '',$_GET["input_mean"]);
@$q = @str_replace("'", '',$_GET["input_mean"]);
@$q = empty($q) ? '' : $q;
if (isset($q)) {
    $MA_Connection->MA_SQL_QUERY("UPDATE means SET most_visitor = most_visitor +1 WHERE word = ?", true, array($q), true, 'Update');
    if (isset($_SESSION['MA_USER_ARABIC_SESSION'])) {
        $MA_CHECK_USER_COUNT = $MA_Connection->MA_SQL_QUERY("SELECT UserID FROM user_search WHERE UserID = ?", true, array($_SESSION['MA_USER_ARABIC_SESSION_ID']), 'count');
        if ($MA_CHECK_USER_COUNT > 0) {
            $MA_CHECK_USER_WORD = $MA_Connection->MA_SQL_QUERY("SELECT WordID FROM user_search WHERE WordID = ?", true, array($q), 'count');
            $MA_CHECK_USER = $MA_Connection->MA_SQL_QUERY("SELECT UserID,WordID FROM user_search WHERE UserID = ? AND WordID = ?", true, array($_SESSION['MA_USER_ARABIC_SESSION_ID'],$q), null, null);

            if ($MA_CHECK_USER_WORD > 0){

                if ($MA_CHECK_USER['WordID'] == $q) {
                    $MA_ = $MA_Connection->MA_SQL_QUERY("UPDATE user_search SET WordSearhedCount = WordSearhedCount +1 WHERE WordID = ?", true, array($q),'Update');
                }

            } else{

                if ($MA_CHECK_USER['WordID'] !== $q){
                    $MA_U = $MA_Connection->MA_SQL_QUERY("INSERT INTO user_search(UserID, WordID, WordSearhedCount) VALUES (:ZUSERID, :zWORDID, :ZWORDCOUNT)", true, array('ZUSERID' => $_SESSION['MA_USER_ARABIC_SESSION_ID'], 'zWORDID' => $q, 'ZWORDCOUNT' => 1), true, 'Update');
                }

            }

        }else {
            $MA_Connection->MA_SQL_QUERY("INSERT INTO user_search(UserID, WordID, WordSearhedCount) VALUES (:ZUSERID, :zWORDID, :ZWORDCOUNT)", true, array('ZUSERID' => $_SESSION['MA_USER_ARABIC_SESSION_ID'], 'zWORDID' => $q, 'ZWORDCOUNT' => 1), true, 'Update');
        }

    }
}// This Statement For Updated And Insert The Data Who Users Searched It
// Query For Fetch Date From Means Table
$MA_Query = "SELECT * FROM means WHERE word LIKE '$q' OR  mean LIKE '$q' OR  collection LIKE '$q' OR glossary_of  LIKE '$q' OR single  LIKE '$q'";
$MA_Word  = $MA_Connection->MA_SQL_QUERY($MA_Query,true,array($q,$q,$q,$q,$q,$q),null,null);

// Query For Fetch UserName By Word_User Table
$MA_Author = $MA_Connection->MA_SQL_QUERY("SELECT id, Username, perm_link FROM users WHERE id = ?",true,array($MA_Word['word_user']),null,null);
// Variables That Fetch Data Storage It.
$MA_WORD           = !empty($MA_Word['word']) ?$MA_Word['word'] : '-'; // متغير الكلمة الرئيسية
$MA_MEAN           = !empty($MA_Word['mean']) ? $MA_Word['mean'] : '-'; // متغير معنى الكلمة
$MA_COLLECTION     = !empty($MA_Word['collection']) ? $MA_Word['collection'] : '-'; // متغير جمع الكلمة
$MA_COUNTER        = !empty($MA_Word['counter']) ? $MA_Word['counter'] : '-'; // متغير عكس الكلمة
$MA_GLOSSARYYoF    = !empty($MA_Word['glossary_of']) ? $MA_Word['glossary_of'] : '-'; // متغير معجم اكلمة .
$MA_SINGLE         = !empty($MA_Word['single']) ? $MA_Word['single'] : '-'; // متغير مفرد الكلمة
$MA_AUTHOR         = $MA_Author['Username'];
$MA_PERMALINK      = $MA_Author['UserPermLink'];
$examined_world    = isset($_GET['input_mean']) ? $_GET['input_mean'] : ''; // حالة شرطية اذا كان هناك بوست يسجيل فى الانبوت
$MA_WORD_COPYRIGHT = "<p class='text-center'> تمت إضافتها بواسطة <a href='/$MA_PERMALINK'>$MA_AUTHOR</a></p>";



?>
<!-- Page-Title -->
<!-- Start Site Content -->
<section class="content">
    <div class="row">
        <div class="container">
            <div class="col-sm-12 class-form">
                <form>
                    <div class="form-group m-b-30 m-t-30" style="position:relative;">

                        <input type="text"
                               onkeyup="showResult(this.value)"
                               onclick="showing()"
                               name="input_mean"
                               id="input_search"
                               placeholder="بحث عت معنى كلمة"
                               class="form-control custom-input-mean MA_Search_inp class-added"
                               style="z-index: 2;background: transparent;border: none;"
                               value="<?php echo $examined_world  ?>"
                               autocomplete="off"/>
                        <div class="form-group m-b-30 suggestion" id="suggestion">

                        </div>
                        <datalist id="autocomplete-ajax"></datalist>
                        <button
                            type="submit"
                            class="btn btn-default btn-mean-sr waves-effect waves-light btn-fed MA_Search_Btn"
                            style="background: none!important;border: none !important;">
                            <i class="fa fa-search"></i>
                        </button>

                        <input type="text" name="country" id="autocomplete-ajax-x"
                               disabled="disabled" class="form-control"
                               style="color: #CCC; position: absolute; background: transparent; z-index: 1;display: none;"/>

                    </div><!-- /.form-group m-b-30 -->

                </form>
            </div> <!-- /.col-sm-12 -->
            <div class="row">
                <!-- Start Ads Code -->
                <div class="col-sm-3">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>اعلاناتا</b></h4>
                        <div class="inbox-widget " tabindex="5000" style="overflow: hidden; outline: none;">
                            <!-- Some Code Here To Show Ads  -->
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- favouritetemplate_footer2_AdSense2_300x250_as -->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:300px;height:250px"
                                 data-ad-client="ca-pub-2013743613389631"
                                 data-ad-slot="5743372702"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div><!-- /.inbox-widget -->
                    </div><!-- /.card-box -->
                </div><!-- /.col-sm-2 -->
                <!-- End Ads Code -->
                <div class="col-sm-6">
                    <div class="card-box" style="    box-shadow: 1px 13px 22px;">
                        <h4 class="m-t-0 header-title "><b id="search-word"></b></h4>
                        <div class="inbox-widget " tabindex="5000" style="overflow: hidden; outline: none;">
                            <div class="MA-Error-Show-Area"></div>
                            <?php
                            if ($q != "MOHAMED") {
                                ?>
                                <ul class="inbox-item MA-Area-Hide">

                                    <li>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img ">
                                                <p class="inbox-item-author "> المعنى : </p>
                                            </div>
                                            <p class="inbox-item-text"><?php echo $MA_MEAN ?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inbox-item">
                                            <?php
                                            if ($q == $MA_COLLECTION) {
                                                ?>
                                                <div class="inbox-item-img">
                                                    <p class="inbox-item-author">المفرد : </p>
                                                </div>
                                                <p class="inbox-item-text"><?php echo $MA_SINGLE ?></p>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="inbox-item-img">
                                                    <p class="inbox-item-author">الجمع : </p>
                                                </div>
                                                <p class="inbox-item-text"><?php echo $MA_COLLECTION ?></p>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img">
                                                <p class="inbox-item-author">التضاد : </p>
                                            </div>
                                            <p class="inbox-item-text">
                                                <a href="?input_mean=<?php echo $MA_COUNTER ?>">
                                                    <?php echo $MA_COUNTER ?>
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img">
                                                <p class="inbox-item-author">المعجم : </p>
                                            </div>
                                            <p class="inbox-item-text"><?php echo $MA_GLOSSARYYoF ?></p>
                                        </div>
                                    </li>
                                </ul><!-- /.inbox-item -->
                                <?php
                            } else{
                                ?>
                                <h1>Created By Mohamed Abdul El-Monem</h1>
                                <?php
                            }
                            ?>
                        </div><!-- /.inbox-widget -->
                        <div class="clearfix"></div>
                    </div><!-- /.card-box -->
                </div><!-- /.col-sm-2 -->
                <!-- Start Ads Code -->
                <div class="col-sm-3">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>اعلاناتا</b></h4>
                        <div class="inbox-widget " tabindex="5000" style="overflow: hidden; outline: none;">
                            <!-- Some Code Here To Show Ads  -->
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- favouritetemplate_footer2_AdSense2_300x250_as -->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:300px;height: auto"
                                 data-ad-client="ca-pub-2013743613389631"
                                 data-ad-slot="5743372702"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div><!-- /.inbox-widget -->
                    </div><!-- /.card-box -->
                </div><!-- /.col-sm-2 -->
                <!-- End Ads Code -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.row -->
</section><!-- /.content -->
<!-- End Site Content -->
<?php
include_once $MA_Temp . "MA-Footer.php";
?>