<?php

//判断是否有无session，如果没有，跳转回登陆页面
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}

//删除该记录
if(isset($_GET['delId'])&&isset($_GET['page'])){
    $delId=$_GET['delId'];
    $page=$_GET['page'];
    include_once 'conn.php';
    $sql="delete from content where id=$delId";
    $del=mysql_query($sql,$conn);
    if ($del){
        header("Location:chat_room.php?page=$page");
        exit();
    }
}
header("Location:chat_room.php?page=$page");
exit();




