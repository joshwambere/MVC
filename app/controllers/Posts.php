<?php
/**
 *
 */
class Posts extends Controller
{
	private $PostModel;
	function __construct()
	{
		if(!isLoggedIn()){
			redirect('users/login');
		}

		$this->PostModel=$this->model('Post');

		$this->UserModel=$this->model('User');

	}
	public function index(){
		$posts=$this->PostModel->getPosts();

  	$data=[
				'posts'=> $posts
				  ];
		$this->view('post',$data);
	}

	public function add(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
				$_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
	      $data=[
	        'title' => trim($_POST['title']),
	        'body'=> trim($_POST['body']),
	        'title_err'=> '',
	        'body_err'=> '',
	      ];
				if(empty($data['title'])){
					$data['title_err']='please enter the post title';
				}

				if(empty($data['body'])){
					$data['body_err']='please enter smthg to post';
				}

				if(empty($data['title_err']) && empty($data['body_err'])){
					$this->PostModel->addPost($data);
					redirect('posts');
				}else{
					$this->view('add',$data);
				}

		}else{
			$data=[
				'title'=> '',
				'body' => ''
			];
		$this->view('add',$data);
	  }
	}

	public function show($id){
		$post=$this->PostModel->getPostById($id);
		$user=$this->UserModel->callUserById($post->user_id);
		
		$data=[
			'posts'=> $post,
			'user'=>$user
		];


		$this->view('show',$data);
	}


}
