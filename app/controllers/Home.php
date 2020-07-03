<?php



class Home extends Controller
{

	function __construct()
	{

	}
	public function index(){
		if(isLoggedIn()){
			redirect('posts');
		}
		$data=[
			'title' => 'sharedpost',
			'desc'=>'Home'
		];
		$this->view('index',$data);
	}



}
