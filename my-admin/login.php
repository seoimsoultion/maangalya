<?php
session_start();
require_once 'includes/db.php';

if (isset($_SESSION['admin'])!="") {
	header("Location: index.php");
	exit;
}
if (isset($_POST['btn-login'])) {
	//var_dump($_POST);
	//die();
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	$password = md5($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT * FROM admin WHERE email='$email'");
	$row=$query->fetch_array();
	
	if($row['status'] ==0){
		$msg = "<div class='alert alert-danger' style='width:50%;'>
				<span class='glyphicon glyphicon-info-sign'></span> &nbsp;Your Account Is Deactivate Please contact Admin !
				</div>";
	}else{
	 
	$query = $DBcon->query("SELECT admin_id, email, password FROM admin WHERE email='$email' AND password ='$password' ");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if ($count==1) {
				
				$code = mt_rand(0,9999); 				
                
				$stmt = $DBcon->query("UPDATE admin SET tokenCode= '$code' WHERE email= '$email'");
                $to=$email;
                $subject="Token Code Form gurga";
                $from = 'noreply@gurga.com';
                $body='Your Token Code Is '.$code;
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                
                mail($to,$subject,$body,$headers);
				$_SESSION ['token'] = $row['admin_id'];				
				$_SESSION ['email'] = $row['email'];				
				header("Location: login.php");
				$_SESSION ['msg'] = '<div id="success" class="alert alert-success" style="width:50%;"><button data-dismiss="alert" class="close" type="button">×</button><i class="icon-ok-sign"></i><strong>Your Token Code send to your e-mail address.</div>';		
			} else {
				$msg = "<div class='alert alert-danger' style='width:50%;'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Email ID or Password !
						</div>";
			}
		}			
	$DBcon->close();
}
	if (isset($_POST['token-code']))	{
			
			$token = strip_tags($_POST['token']);
			 $query = $DBcon->query("SELECT admin_id,email,tokenCode FROM admin WHERE tokenCode='$token' AND email='".$_SESSION ['email']."'");
			$row=$query->fetch_array();
			$num_row = $query->num_rows;
			
			if($num_row > 0)
			{
					$_SESSION['admin'] = $row['admin_id'];
					$_SESSION ['MSG'] = 1;
					header("Location: index.php");
			}		
			else {
			$msg = "<div class='alert alert-danger' style='width:50%;'>
				<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Token Code !
			</div>";
			}
	$DBcon->close();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>maangalya</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Social Kitchen">
<meta name="IIC Islamic Information Centre" content="Social Kitchen">
<!-- styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.css">
<!--[if IE 7]>
            <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
        <![endif]-->
<link href="css/styles.css" rel="stylesheet">
<link href="css/theme-wooden.css" rel="stylesheet">

<!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/ie/ie7.css" />
        <![endif]-->
<!--[if IE 8]>
            <link rel="stylesheet" type="text/css" href="css/ie/ie8.css" />
        <![endif]-->
<!--[if IE 9]>
            <link rel="stylesheet" type="text/css" href="css/ie/ie9.css" />
        <![endif]-->
<link href="css/aristo-ui.css" rel="stylesheet">
<link href="css/elfinder.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<!--fav and touch icons -->
<link rel="shortcut icon" href="ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
<!--============j avascript===========-->
<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body >
<div class="layout">
	<div class="container">
		<center><a href="./"><img src="../img/maangalya/MAANGALYA-_New-Logo.jpg" alt="maangalya" ></a>
		</center>
		<br/>
		<center>
		<?php
		if(isset($msg)){
			echo $msg;
		}
		?>
		</center>
		<?php if(isset($_SESSION ['token'])){ 
		echo "<center>" ;
		echo $_SESSION ['msg'];
			//$_SESSION ['msg']="";
		echo "</center>";
		?>
		<form class="form-signin" method="post" action="login.php">
			<h3 class="form-signin-heading">Token Code</h3>
			<div class="controls input-icon">
				<i class=" icon-key"></i>
				<input type="text" class="input-block-level" placeholder="Enter Token Code" name="token" required>
			</div>
			<button class="btn btn-inverse btn-block" name="token-code" value="submit" type="submit">Submit</button>
			
		</form>
		<?php }else{ ?>
		<form class="form-signin" method="post" action="login.php">
			<h3 class="form-signin-heading">Login in</h3>
			<div class="controls input-icon">
				<i class=" icon-user-md"></i>
				<input class="input-block-level" type="email" placeholder="Email Id" name="email" required>
			</div>
			<div class="controls input-icon">
				<i class=" icon-key"></i><input type="password" class="input-block-level" placeholder="Password" name="password" required>
			</div>
			<button class="btn btn-inverse btn-block" name="btn-login" value="submit" type="submit">Sign in</button>
			
		</form>
		<?php } ?>
	</div>
</div>
<script>
    jQuery(document).ready(function() {     
      
    });
  </script>
</body>
</html>
