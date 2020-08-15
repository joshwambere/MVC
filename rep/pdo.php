<?php
 $host='localhost';
 $user='root';
 $pwd='';
 $db='aroma';

 $dsn='mysql:host='.$host.';dbname='.$db;
 $pdo=new PDO($dsn, $user, $pwd);
 $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
 $stat='admn';

 $sql='SELECT * FROM users where gender=:status';
 $stmt=$pdo->prepare($sql);
 $stmt->execute(['status'=>$stat]);
 $users=$stmt->fetchAll();

 foreach ($users as $user) {
   echo $user->name.'<br>';
 }

 $ins='INSERT INTO users (name,gender,age) values(:name,:gender, :age)';
 $stm=$pdo->prepare($ins);
 $stm->execute(['name'=>'johns', 'gender'=> 'admn', 'age'=> 24]);
 echo "added";
