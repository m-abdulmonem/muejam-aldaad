<?php

require_once '../app/init.php';

$app = new App();
$app->copyright();
$app->hello("Hello! World");
echo "<br />";
$app->sum(1,12);
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
$id = 1;
$connection = new Connection('arabic');
$connection->prepare("SELECT * FROM users WHERE UserId = ?",array($id));

$str = "محمد عبد المنمع";
explode(" ", $str);
print_r(explode(" ", $str));

?>




    document.getElementById("search-word").innerHTML= str;
    if (input_search.value ===  ""){
    suggestion.style.display = "none";
    } else {
    suggestion.style.display = "block";
    }
<?php
                                if (empty($q)){
                                    echo "<h1 class='ma ma-info text-center  m-b-10' style='margin-top: 21px;font-size: 28px '> برجاء كتابة كلمة لإيجاد معناها</h1>";
                                } elseif (($q != $MA_WORD) or ($q != $MA_COLLECTION) or ($q != $MA_COUNTER) or ($q != $MA_MEAN) or ($q != $MA_GLOSSARYYoF) or ($q != $MA_SINGLE)){
                                    echo "<h1 class='ma ma-info text-center m-b-10' style='margin-top:38px;font-size: 28px '> لايوجد معنى لهذه الكلمة </h1>";
                                } else {
                                    if (strlen($q) > 0) {
                                        if ($q == $MA_WORD) {
                                            ?>
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
                                                    <div class="inbox-item-img">
                                                        <p class="inbox-item-author">الجمع : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_COLLECTION ?></p>
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

                                            <?php
                                            echo $MA_WORD_COPYRIGHT;
                                        } elseif ($q == $MA_MEAN) {
                                            ?>
                                            <li>
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img ">
                                                        <p class="inbox-item-author "> المعنى : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_WORD ?></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img">
                                                        <p class="inbox-item-author">الجمع : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_COLLECTION ?></p>
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
                                            <?php
                                            echo $MA_WORD_COPYRIGHT;
                                        } elseif ($q == $MA_COLLECTION) {
                                            ?>
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
                                                    <div class="inbox-item-img">
                                                        <p class="inbox-item-author">المفرد : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_SINGLE ?></p>
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
                                            <?php
                                            echo $MA_WORD_COPYRIGHT;
                                        } elseif (($MA_COUNTER == $MA_WORD) or ($MA_WORD == $MA_COUNTER)) {
                                            $MA_Counter_Word     = $MA_Connection->MA_SQL_QUERY("SELECT * FROM means WHERE counter LIKE '$q' ",false,'',true,null);
                                            $MA_COUNTER_MEAN        = $MA_Counter_Word['mean'];
                                            $MA_COUNTER_COLLECTION  = $MA_Counter_Word['collection'];
                                            $MA_COUNTER_SElF        = $MA_Counter_Word['counter'];
                                            $MA_COUNTER_GLOSSARYYoF = $MA_Counter_Word['GlossaryOf'];
                                            ?>
                                            <li>
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img ">
                                                        <p class="inbox-item-author "> المعنى : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_COUNTER_MEAN ?></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img">
                                                        <p class="inbox-item-author">الجمع : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_COUNTER_COLLECTION ?></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img">
                                                        <p class="inbox-item-author">التضاد : </p>
                                                    </div>
                                                    <p class="inbox-item-text">
                                                        <a href="?input_mean=<?php echo $MA_COUNTER_SElF ?>">
                                                            <?php echo $MA_COUNTER_SElF ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img">
                                                        <p class="inbox-item-author">المعجم : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_COUNTER_GLOSSARYYoF ?></p>
                                                </div>
                                            </li>

                                            <?php
                                            echo $MA_WORD_COPYRIGHT;
                                        } elseif ($q == $MA_SINGLE) {
                                            ?>
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
                                                    <div class="inbox-item-img">
                                                        <p class="inbox-item-author">الجمع : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_COLLECTION ?></p>
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

                                            <?php
                                            echo $MA_WORD_COPYRIGHT;
                                        } else {
                                            ?>
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
                                                    <div class="inbox-item-img">
                                                        <p class="inbox-item-author">الجمع : </p>
                                                    </div>
                                                    <p class="inbox-item-text"><?php echo $MA_COLLECTION ?></p>
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

                                            <?php
                                            echo $MA_WORD_COPYRIGHT;
                                        }
                                    }
                                }



                                ?>