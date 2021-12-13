<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/22/2017
 * Time: 07:52 م
 */
$MA_GET_USER_PROFILE = $MA_TRIGGER_USER_CLASS->MA_URL();
//echo $MA_GET_USER_PROFILE[2];
?>

<div class="ma-cover">
    <img src="<?php echo $MA_Img ?>user-profile-bg.jpg">
</div>
<section class="content">
    <div class="MA-Container">
        <div class="ma-right">
            <div class="ma-top-user-img">
                <div class="MA-Content-Imgs">
                    <div class="ma-img-user">
                        <img src="<?php echo $MA_Img ?>users/avatar-1.jpg">
                    </div>
                    <div class="ma-user-information">

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="ma-left">

            <!-- Todos app -->
            <div class="col-lg-4"  style="padding: 0!important;">
                <div class="card-box">
                    <h4 class="m-t-0 m-b-20 header-title"><b>قائمة مهامى</b></h4>
                    <div class="todoapp">
                        <div class="row">
                            <div class="col-sm-6">
                                <button
                                    class="pull-right btn btn-primary btn-sm waves-effect waves-light"
                                    style="float: right!important;"
                                    id="btn-archive">تحقيق</button>
                            </div>
                            <div class="col-sm-6">
                                <h4 id="todo-message" style="float: left!important;"><span id="todo-remaining">1</span> من <span id="todo-total">5</span> تحقق</h4>
                            </div>
                        </div>

                        <ul class="list-group no-margn nicescroll todo-list" style="height: 280px" id="todo-list">
                            <li>
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox1[]" type="checkbox">
                                        <label for="checkbox1[]">
                                            TEst Task
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <form name="todo-form" id="todo-form" role="form" class="m-t-20">
                            <div class="row">
                                <div class="col-sm-3 todo-send" style="width: 100%;">
                                    <button class="btn-primary btn-md btn-block btn waves-effect waves-light" type="button" id="todo-btn-submit">إضافة</button>
                                </div>
                                <div class="col-sm-9 todo-inputbar">
                                    <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="إضافة مهام جديده">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

        </div>
    </div>
</section>