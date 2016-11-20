<?php

$conn=mysql_connect("localhost","root","") or die("连接失败".mysql_error());
mysql_select_db("chat_room",$conn) or die("选择数据库失败".mysql_error());
mysql_query("set names utf8",$conn) or die("设置编码失败".mysql_error());