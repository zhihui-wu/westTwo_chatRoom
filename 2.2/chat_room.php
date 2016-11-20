<?php 
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style type="text/css">
	div,body,h3,table,ul,li,h1,p,h3,input,h2{margin:0px;padding:0px;}
	body{background-color:#cfcfcf;}
	.outside{background-color:#99ccff;margin:50px auto;width:900px;border:1px solid #c2c2c2;}
	.header{background-color:#134f8c;width:900px;height:50px;}
	.header h1{float:left;color:white;font-faminly:黑体;font-size:25px;height:50px;line-height:50px;}
    .header p{float:left;color:white;font-faminly:楷体;font-size:14px;height:50px;line-height:50px;}
    .footer{clear:both; background-color:#134f8c;width:900px;height:50px;}
	.footer p{color:white;font-faminly:楷体；font-size:14px;height:50px;line-height:50px;}
 	.center{} 
 	.right{background-color:#134f8c;margin:20px auto; padding:18px;width:500px;border:1px solid #c2c2c2;} 
 	.right li{color:white;font-faminly:楷体；font-size:14px;height:30px;line-height:30px;list-style-type:none;} 
	.left{margin:20px  auto; padding:15px;width:450px;}
 	.left input{height:25px;} 
	a:link,a:visited{color:white;text-decoration:none;}
    a:hover{color:#ffff33;text-decoration:underline;}
	
/*	.title h3{font-faminly:黑体;background-color:#134f8c;color:white;height:50px;line-height:50px;text-align:center;} */
</style>
</head>
<body>
	<div class="outside">
	
	
        <div class="header">
            <h1>&nbsp;西二在线聊天室&nbsp;</h1>
            <p>
            <?php 
                    echo "欢迎".$_SESSION['username']."登录";
            ?>
            </p>
            <p>&nbsp;<a href="chat_room.php">列表刷新</a></p>
            <p>&nbsp;<a href="login.php">退出登录</a></p>
        </div>
        
        
        <div class="center">
        
            <div class="left">        	
            	<form action="chatAction.php" method="post">
            		&nbsp;
            		<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                    <input class="chat" type="text" name="content" size="45" />
    				<input type="submit"  value="快速发言"/>
				</form>
            </div>
            
            <div class="right">
                <?php 
                ini_set("display_errors", "Off");
                error_reporting(E_ALL | E_STRICT);
                
                include_once 'conn.php';
                
                if (isset($_GET['page'])){
                    $page=$_GET['page'];
                }else{
                    $page=1;
                }
                
                if($page){
                    $page_size=10;
                    $sql="select * from content";
                    $res=mysql_query($sql,$conn);
                    $message_count=mysql_num_rows($res);
                    mysql_free_result($res);
                    $page_count=ceil($message_count/$page_size);
                    $offset=($page-1)* $page_size;
                    $sql="select * from content where id order by id desc limit $offset,$page_size";
                    $res=mysql_query($sql,$conn);
                }
                
                echo "<ul>";
                while ($row=mysql_fetch_assoc($res)){
                    $sql2="select username from user where id={$row['user_id']}";
                    $res2=mysql_query($sql2,$conn);
                    $row2=mysql_fetch_assoc($res2);
                    echo "<li>".$row['content']."</li><li>(".$row2['username']."\t".$row['uptime'];
                    if ($_SESSION['username']==$row2['username']){
                        $delId=$row['id'];
                        echo "&nbsp<a href=chatDeleteAction.php?delId=".$delId."&page=".$page.">删除</a>";
                    }
                    echo ")</li><hr/>";
                }; 
                echo "</ul>";
                
                
                echo "页次：".$page."/".$page_count."页&nbsp;记录：".$message_count."条&nbsp;";
                if ($page!=1){
                    echo "<a href=chat_room.php?page=1>首页</a>&nbsp;";
                    echo "<a href=chat_room.php?page=".($page-1).">上一页</a>&nbsp;";
                }
                if($page<$page_count){
                    echo "<a href=chat_room.php?page=".($page+1).">下一页</a>&nbsp;";
                    echo "<a href=chat_room.php?page=".$page_count.">尾页</a>";
                }
                
                mysql_free_result($res);
                mysql_free_result($res2);
                mysql_close($conn);
                
                ?>
            </div>
            
        </div>
        
        
        <div class="footer">
            <?php 
            date_default_timezone_set("Asia/ShangHai");
            $date=date('Y/m/d H:i:s');
            echo "<p>&nbsp;&nbsp;".$date."</p>";
            ?>
        </div>
        
        
	</div>
</body>
</html>