<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 02/21/2017
 * Time: 10:26 ص
 */

require 'MA_App_Routing.php';
//require 'MA-Classes/MA_User_Profile.php';
new MA_App_Routing();
//$App = new MA_User_Profile();
//$MA_Test = $App->MA_URL();
//if (isset($MA_Test[3])){
  //  echo $MA_Test[3];
//}
/*
define('INC', dirname(__DIR__));
require INC . '/vendor/autoload.php';
// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];
$app = new \Slim\App($config);

// Define app routes
$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});

*/