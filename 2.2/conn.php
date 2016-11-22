<?php

//连接数据库文件
$conn=mysql_connect("localhost","root","") or die("����ʧ��".mysql_error());
mysql_select_db("chat_room",$conn) or die("ѡ�����ݿ�ʧ��".mysql_error());
mysql_query("set names utf8",$conn) or die("���ñ���ʧ��".mysql_error());