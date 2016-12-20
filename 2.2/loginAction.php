<?php
session_start();
//判断提交,是否有提交内容、是否为空 
if(isset($_POST['submit'])){
    if($_POST['username']!="" && $_POST['password']!=""){
          $username=$_POST['username'];
          $password=md5($_POST['password']);
          
          
          //包含数据库连接文件
          include_once 'conn.php';
          
          
          //验证用户名密码是否正确,不正确或数据库中无该用户，则返回errno=1
          $sql="select password from user where username='".$username."'";
          $res=mysql_query($sql,$conn) or die(mysql_error());
          $row=mysql_fetch_assoc($res);
          if($row){
              if($row['password']==$password){
                  $_SESSION['username']=$username;
                  header("Location:chat_room.php");
                  exit();
              }  
          }
          header("Location:login.php?errno=1");
          exit();
          
          mysql_free_result($res);
          mysql_close($conn);
          
    }else {
          //用户名密码为空，则返回errno=3
          header("Location:login.php?errno=3");
    }
    
}else{
    //无提交内容，则跳转回登陆界面
    header("Location:login.php");
}
