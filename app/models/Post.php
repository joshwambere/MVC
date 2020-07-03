<?php

/**
 *
 */
class Post
{
  //create a variable to hold db instance
  private $db;
  function __construct()
  {
    $this->db=new Db;

  }

  public function getPosts(){
    $this->db->query("SELECT *,
                                posts.id as postId,
                                users.id as userId,
                                posts.created_at as postCreated,
                                users.created_at as userCreated
                                FROM posts
                                INNER JOIN users
                                on posts.user_id=users.id
                                ORDER BY posts.created_at Desc");
    $result= $this->db->resultset();
    return $result;
  }

  public function addPost($data){
    //prepare a statement
    $this->db->query('INSERT INTO posts (user_id,title,body) VALUES(:user_id, :title, :body)');
    //bind values to named Params
    $this->db->bind(':user_id',$_SESSION['user_id']);
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':body', $data['body']);

    //then execute the statement
    if($this->db->execute()){
      return true;
    }else{
      return false;
    }
  }

  public function getPostById($id){
    $this->db->query('SELECT * FROM posts where id=:id');
    $this->db->bind(':id',$id);
    $row=$this->db->single();

    return $row;
  }
}
