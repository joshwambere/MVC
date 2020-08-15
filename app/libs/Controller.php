<?php

/**
 * this call consist of core methods needed by the controller
 * model
 * view
 */

class Controller
{

	public function model($model){
		if(file_exists('../app/models/'. $model .'.php')){
			require '../app/models/'.$model. '.php';
		}
		return new $model();
	}



	public function view($view, $data =[]){
		if(file_exists('../app/views/'.$view.'.php')){
			require '../app/views/'.$view.'.php';
		}else{
			die('View not available');
		}

	}



}
