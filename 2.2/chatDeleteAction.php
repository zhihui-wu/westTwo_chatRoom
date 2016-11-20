<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}
if(isset($_GET['delId'])&&isset($_GET['page'])){
    $delId=$_GET['delId'];
    $page=$_GET['page'];
    include_once 'conn.php';
    $sql="delete from content where id=$delId";
    $del=mysql_query($sql,$conn);
    if ($del){
        echo "<script>alert('É¾³ý³É¹¦');</script>";
        header("Location:chat_room.php?page=$page");
        exit();
    }
}
echo "<script>alert('É¾³ýÊ§°Ü');</script>";
header("Location:chat_room.php?page=$page");
exit();




