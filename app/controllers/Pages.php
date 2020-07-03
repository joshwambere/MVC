<?php

/**
 *
 */
class Pages extends Controller
{

	function __construct()
	{
		$data=['title' => 'welcome',
						'desc'=>'pages'
					];
		$this->view('pages',$data);
	}

	public function index(){
		

	}
}
