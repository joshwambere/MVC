<?php



class About extends Controller
{

	function __construct()
	{

	}
	public function index(){
		$data=[
			'title' => 'sharedpost',
      'desc'=>'about us'
		];
		$this->view('about',$data);
	}



}
