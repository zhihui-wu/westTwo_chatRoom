<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style type="text/css">
	div,body,h3,table,ul,li,h1{margin:0px;padding:0px;}
	body{background-color:#cfcfcf;}
	.outside{background-color:#99ccff;margin:50px auto;width:900px;border:1px solid #c2c2c2;}
	.header{background-color:#134f8c;width:900px;height:70px;}
	.header h1{color:white;text-align:center;font-faminly:楷体;font-size:40px;height:70px;line-height:70px;}
    .footer{background-color:#134f8c;width:900px;height:50px;}
	.footer p{color:white;font-faminly:楷体;font-size:14px;height:50px;line-height:50px;}
	.center{background-color:#e0e0e0;margin:90px auto;width:300px;}
	.center .error{font-size:13px;}
	.content{padding:18px;}
	.content li{font-faminly:楷体;font-size:14px;height:35px;line-height:35px;list-style-type:none;}
	.title h3{font-faminly:黑体;background-color:#134f8c;color:white;height:50px;line-height:50px;text-align:center;}
</style>
<!-- <script type="text/javascript"> -->
<!-- // function check(){ -->
<!-- // 	if(form.username.value==""){ -->
<!-- // 		alert("请输入用户名！") -->
<!-- // 	} -->
<!-- // } -->
<!-- </script> -->
</head>
<body>
	<div class="outside">
	<div class="header">
	<h1>西二在线聊天室</h1>
	</div>
	<div class="center">
	<div class="title"><h3>登录列表</h3></div>
	<div class="content">
	<form action="loginAction.php" method="post">
	<ul>
	<li>户　名：<input type="text" name="username"/></li>
	<li>密　码：<input type="password" name="password"/></li>
	<li>&nbsp;&nbsp;<input type="reset" value="重新填写"/>&nbsp;&nbsp;&nbsp;
					<input type="submit" name="submit" value="用户登录"/>　</li>
	<li class="error">
	&nbsp;&nbsp;
	<a href="reg.php">立即注册</a>
	&nbsp;&nbsp;
	<?php 
	if(!empty($_GET['errno'])){
	    $errno=$_GET['errno'];
	    if ($errno==3){
	        echo "密码或用户名不能为空";
	    }elseif($errno==1){
	        echo "&nbsp;密码或用户名错误";
	    }elseif($errno==2){
	        echo "&nbsp;注册成功，请登录";
	    }
	}
	?>
	</li>
	</ul>
	</form>
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