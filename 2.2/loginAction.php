<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}
if(isset($_POST['submit'])){
    if($_POST['username']!="" && $_POST['password']!=""){
          $username=$_POST['username'];
          $password=md5($_POST['password']);
          
          
          include_once 'conn.php';
          
         
          $sql="select password from user where username={$username}";
          $res=mysql_query($sql,$conn);
          while($row=mysql_fetch_assoc($res)){
              if($row['password']==$password){
                  $_SESSION['username']=$username;
                  header("Location:chat_room.php");
                  exit();
              }  
          }
          //header("Location:login.php?errno=1");
          var_dump("$password");
          exit();
          
          mysql_free_result($res);
          mysql_close($conn);
    }else {
          header("Location:login.php?errno=3");
    }
}else{
    header("Location:login.php");
}
