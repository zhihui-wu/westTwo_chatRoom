<?php
  $username=$_POST[username];
  $password=md5($_POST[password]);
  
  include_once 'conn.php';
  
  $sql="select username from user";
  $res=mysql_query($sql,$conn);
  
  while ($row=mysql_fetch_assoc($res)){
      if($row['username']==$username){
          header("Location:reg.php?errno=1");
          exit();
      }
  }
  
  $sql1="insert into user (username,password) values('{$username}','{$password}')";
  $res1=mysql_query($sql1,$conn);
  if ($res1){
      header("Location:login.php?errno=2");
      exit();
  }
  
  mysql_free_result($res);
  mysql_close($conn);
  
  
