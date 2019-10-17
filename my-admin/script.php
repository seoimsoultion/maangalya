<?php 
include ('includes/db.php');
//echo $_REQUEST['id'];
$q=mysql_query("select * from `user` where `id`='$_REQUEST[id]'");
if (mysql_num_rows($q)>0) {
	//echo mysql_num_rows($q);
	$res=mysql_fetch_object($q);
    // echo $res->admin_permission;
	 if ($res->admin_permission=='enable') {
		 mysql_query("update  `user` set `admin_permission`='disable' where `id`='$_REQUEST[id]'");
	 }else {
		 mysql_query("update  `user` set `admin_permission`='enable' where `id`='$_REQUEST[id]'");
	 }
	 
$q1=mysql_query("select * from `user` where `id`='$_REQUEST[id]'");
	$res2=mysql_fetch_object($q1);
echo ucfirst($res2->admin_permission);
	}

?> 