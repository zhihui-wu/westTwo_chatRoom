<?php

//判断是否有无session，如果没有，跳转回登陆页面
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}

//删除该记录
if(isset($_GET['delId'])&&isset($_GET['page'])){
    $username=$_SESSION['username'];
    echo $username;
    $delId=$_GET['delId'];
    $page=$_GET['page'];
    include_once 'conn.php';
    $sql="select user_id from content where id='".$delId."'";
    $res=mysql_query($sql,$conn);
    if ($row=mysql_fetch_assoc($res)){
        $sql="select username from user where id='".$row['user_id']."'";
        $res=mysql_query($sql,$conn);
        $row=mysql_fetch_assoc($res);
        if ($row){
            if($row['username']==$username){
                $sql="delete from content where id=$delId";
                $del=mysql_query($sql,$conn);
                if ($del){
                    header("Location:chat_room.php?page=$page");
                    exit();
                }
            }
        }
    }
}
header("Location:chat_room.php?page=$page");
exit();




