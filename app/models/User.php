<?php

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Db;

  }

  public function register($data){
    //prepare a statement
    $this->db->query('INSERT INTO users (name,email,password) VALUES(:name, :email, :password)');
    //bind values to named Params
    $this->db->bind(':name',$data['name']);
    $this->db->bind(':email',$data['email']);
    $this->db->bind(':password', $data['password']);

    //then execute the statement
    if($this->db->execute()){
      return true;
    }else{
      return false;
    }
  }

  public function callUserByEmail($email){
    $this->db->query('SELECT * FROM users WHERE email =:email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();
    if($this->db->rowCount() > 0){
      return true;
    }else{
      return false;
    }

  }


  public function login($email, $password){
    $this->db->query('SELECT * FROM users WHERE email=:email');
    $this->db->bind(':email', $email);
    $row=$this->db->single();

    $hashed_pwd=$row->password;
    if(password_verify($password,$hashed_pwd)){
      return $row;
    }else{
      return false;
    }
  }

  public function callUserById($id){
    $this->db->query('SELECT * FROM users WHERE id =:id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();
    return $row;
  }
}
?>
