<?php 
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}
if ($_POST['content']!=""){
    $username=$_POST['username'];
    $content=$_POST['content'];
    
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
