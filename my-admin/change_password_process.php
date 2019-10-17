<?php
session_start();
require_once("includes/db.php");

$old_password	=	md5($_POST['old_password']);
$password 		= 	md5($_POST['password']);
$con_frm 		= 	md5($_POST['confirm_password']);
$admin_id 		=	$_SESSION['admin'];

$errors = array();

if (empty($_POST['old_password'])) 
{
//$errors[] = 'Old Password cannot be blank.';
die('<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<i class="icon-minus-sign"></i><strong>Warning!</strong> Old Password cannot be blank. 
	</div>');
}
if (empty($_POST['password'])) 
{
//$errors[] = 'Password cannot be blank.';
		die('<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<i class="icon-minus-sign"></i><strong>Warning!</strong> Password cannot be blank.</div>');
}
if (strlen($_POST['password']) < 5) 
{
die('<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<i class="icon-minus-sign"></i><strong>Warning!</strong> Your password must be at least 5 characters long.</div>');
}
if($password!=$con_frm)
{
die('<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<i class="icon-minus-sign"></i><strong>Warning!</strong> Confirm password does not match with password. </div>');

}
if (empty($_POST['confirm_password'])) 
{
die('<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<i class="icon-minus-sign"></i><strong>Warning!</strong> Confirm Password cannot be blank.</div>');
}
if (count($errors) >0) 
{
foreach ($errors as $error) 
{ ?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<i class="icon-minus-sign"></i><strong>Warning!</strong> <?php  echo $error; ?> 
	</div> 
<?php
}
}

else{
$sql = "SELECT * FROM admin WHERE admin_id = '$admin_id' AND password = '$old_password'"; 

$result = $DBcon->query($sql); 
$num = $result->num_rows;

		
if ($num != 0 ) { 

   if($DBcon->query("UPDATE admin SET password='$password' WHERE admin_id = '$admin_id'")) 
   {
		echo "OK";
   }
	}
	else {
	?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="icon-minus-sign"></i><strong>Warning!</strong> Old Password Is Incorrect !
		</div> 
	<?php 
	
    } }   ?>