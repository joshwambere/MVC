<?php


class Users extends Controller
{

  public function __construct()
  {
    $this->userModel = $this->model('User');
  }
  public function index(){

  }




  public function register(){

    if($_SERVER['REQUEST_METHOD']=='POST'){
      //PROCESS THE FORM FUNCTIONS
      $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data=[
        'name' => trim($_POST['name']),
        'email'=> trim($_POST['email']),
        'password'=> trim($_POST['password']),
        'conf_password'=> trim($_POST['conf_password']),
        'name_err'=> '',
        'email_err'=> '',
        'password_err'=> '',
        'conf_password_err'=> ''
      ];
      //check if name field is empty
      if(empty($data['name'])){
        $data['name_err']='please enter name';
      }

      //check empty email
      if(empty($data['email'])){
        $data['email_err']='please enter an email';
      }else{
        if($this->userModel->callUserByEmail($data['email'])){
          $data['email_err']='email taken';
        }
      }

      //check password
      if(empty($data['password'])){
        $data['password_err']="password can't be empty";
      }elseif (strlen($data['password']) < 6) {
        $data['password_err']='password must be 6 character and above';
      }

      //check confirm password
      if(empty($data['conf_password'])){
        $data['conf_password_err']="confirm password";
      }else{
        if($data['password']!=$data['conf_password']){
          $data['conf_password_err']="password do not match";
        }
      }
      if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['conf_password_err']) ){
        $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
        if ($this->userModel->register($data)) {
          flash('register_success', 'Account created you can login');
          redirect('users/login');
        }else {
          die('something went wrong');
        }
      }else{
        $this->view('users/register',$data);
        }


    }else {
      //load the form
      $data=[
        'name' => '',
        'email'=> '',
        'password'=> '',
        'conf_password'=> '',
        'name_err'=> '',
        'email_err'=> '',
        'password_err'=> '',
        'conf_password_err'=> ''
      ];

      $this->view('users/register',$data);
    }
  }
  //login function
  public function login(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      //sanitize all the data in POST server request
      $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      $data=[
        'email'=> trim($_POST['email']),
        'password'=> trim($_POST['password']),
        'email_err'=> '',
        'password_err'=> ''
      ];

      //check empty email
      if(empty($data['email'])){
        $data['email_err']='please enter an email';
      }

      //check password
      if(empty($data['password'])){
        $data['password_err']="please enter the password";
      }
      //check user for that email
      if($this->userModel->callUserByEmail($data['email'])){

      }else{
        $data['email_err']='user not found';
      }

      //check if no errors
      if(empty($data['email_err']) && empty($data['password_err']) ){
        $loggedInUser=$this->userModel->login($data['email'], $data['password']);

        //check if passsword matched
        if($loggedInUser){
          $this->createUserSession($loggedInUser);
        }else{
          $data['password_err']='passsword incorrect';
        }


      }
      $this->view('users/login',$data);


    }else {
      //load the form
      $data=[
        'email'=> '',
        'password'=> '',
        'email_err'=> '',
        'password_err'=> '',
      ];

      $this->view('users/login',$data);
    }
  }

  public function createUserSession($user){
    $_SESSION['user_id']= $user->id;
    $_SESSION['user_name']= $user->name;
    $_SESSION['user_email']= $user->emal;
    redirect('posts');

  }

  public function logout(){
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    session_destroy();

    redirect('users/login');

  }


  public function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
      return true;
    }else{
      return false;
    }
  }
}

 ?>
