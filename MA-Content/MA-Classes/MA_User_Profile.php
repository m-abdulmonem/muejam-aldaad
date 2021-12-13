<?php

/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/22/2017
 * Time: 07:59 م
 */
class MA_User_Profile
{


    public function MA_URL(){
        $MA_PROFILE_USER_LINK =$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $MA_PROFILE_USER_LINK_ARRAY = explode('/',$MA_PROFILE_USER_LINK);
        return $MA_PROFILE_USER_LINK_ARRAY;
    }
}