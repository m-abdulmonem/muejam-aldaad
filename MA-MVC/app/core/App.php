<?php

class App {
    public  $mohamed = "Created by Mohamed Abdul Al Monem";
    public  $mohamed_copy_right = "Created by Mohamed Abdul Al Monem";
    public function hello($print_hello_world){
        echo $print_hello_world;
    }


    public function sum($num1, $num2){
        $x = $num1 + $num2;
        echo $x;
    }
    public function copyright(){
        if (!isset($this->mohamed)){
            header("Location: http://www.arabicapp.esy.es");
            exit();
        } elseif (($this->mohamed_copy_right) !== ($this->mohamed)) {
            header("Location: http://www.arabicapp.esy.es");
            exit();
        }

    }


}