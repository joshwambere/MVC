<?php

class Errorhandler extends Controller{
    function __construct(){
        $data=[
            'errorCode'=>'404'
        ];
        $this->view('error',$data);
    }
}