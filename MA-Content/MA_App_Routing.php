<?php

/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/22/2017
 * Time: 06:43 م
 */
class MA_App_Routing
{

    protected $MA_CONTROLLER = "home";
    protected $MA_METHOD = "index";
    protected $MA_PARAMS = [];

    public function __construct()
    {
        $url = $this->parseUrl();
    }
    public function parseUrl(){
        if (isset($_GET['MA_Url'])){
            return $url = explode('/',filter_var(rtrim($_GET['MA_Url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}