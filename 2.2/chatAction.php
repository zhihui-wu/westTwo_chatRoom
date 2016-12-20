<?php 

//判断是否有无session，如果没有，跳转回登陆页面
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}

//判断发言是否为空，如果非空，则插入数据库中
if (trim($_POST['content'])!=""){
    $username=$_POST['username'];
    $content=strip_tags($_POST['content']);
    
    include_once 'conn.php';
    
    $sql="select id from user where username='{$username}'";
    $res=mysql_query($sql,$conn);
    if($row=mysql_fetch_assoc($res)){
        $sql1="insert into content (uptime,content,user_id)value( NOW(),'{$content}','{$row['id']}')";
        $res1=mysql_query($sql1,$conn);
    }
}
header("Location:chat_room.php");
exit();
