<?php

/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/22/2017
 * Time: 09:49 م
 */
class MA_Page_Error
{
    public function PageNotFound(){
        ?>
        <div class="account-pages"></div>
        <div class="clearfix"></div>

        <div class="wrapper-page">
            <div class="ex-page-content text-center">
                <div class="text-error"><span class="text-primary">4</span><i class="ti-face-sad text-pink"></i><span class="text-info">4</span></div>
                <h2>Who0ps! Page not found</h2><br>
                <p class="text-muted">This page cannot found or is missing.</p>
                <p class="text-muted">Use the navigation above or the button below to get back and track.</p>
                <br>
                <a class="btn btn-default waves-effect waves-light" href="../../index.php"> Return Home</a>

            </div>
        </div>
        <?php
    }

}