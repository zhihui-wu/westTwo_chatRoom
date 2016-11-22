<?php

//判断提交,是否有提交内容、是否为空
if(isset($_POST['submit'])){
    if(trim($_POST['username'])!="" && trim($_POST['password'])!=""){
      $username=$_POST[username];
      $password=md5($_POST[password]);
      
      //包含数据库连接文件
      include_once 'conn.php';
      
      $sql="select username from user";
      $res=mysql_query($sql,$conn);
      
      //如果用户名已存在,则返回errno=1
      while ($row=mysql_fetch_assoc($res)){
          if($row['username']==$username){
              header("Location:reg.php?errno=1");
              exit();
          }
      }
      
      //注册成功,则跳转回登陆界面
      $sql1="insert into user (username,password) values('{$username}','{$password}')";
      $res1=mysql_query($sql1,$conn);
      if ($res1){
          header("Location:login.php?errno=2");
          exit();
      }
      
      mysql_free_result($res);
      mysql_close($conn);
    }else{
        //如果用户名密码为空,则返回errno=3
        header("Location:reg.php?errno=3");
    }
}else{
    //无提交内容，则跳转回登陆界面
    header("Location:login.php");
}
  
  
