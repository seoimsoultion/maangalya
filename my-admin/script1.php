<?php 
include ('includes/db.php');
//echo $_REQUEST['id'];
/*echo "select recipe.id,recipe.tittle,recipe.rec_image,recipe.create_date,recipe.create_date,recipe.status,user.username from recipe,user where recipe.id='$_REQUEST[id]'";
*/

  $q=mysql_query("select recipe.id,recipe.tittle,recipe.rec_image,recipe.create_date,recipe.create_date,recipe.status,user.username from recipe,user where recipe.id='$_REQUEST[id]'");
if (mysql_num_rows($q)>0) {
//	echo mysql_num_rows($q);
	$res=mysql_fetch_object($q);
  //  echo $res->status;
	 if ($res->status=='pending') {
		 mysql_query("update  `recipe` set `status`='approved' where `id`='$_REQUEST[id]'");
	}else 
		 {
	 mysql_query("update  `recipe` set `status`='pending' where `id`='$_REQUEST[id]'");
         }
	 
$q1=mysql_query("select recipe.id,recipe.tittle,recipe.rec_image,recipe.create_date,recipe.create_date,recipe.status,user.username from recipe,user where recipe.id='$_REQUEST[id]'");
	$res2=mysql_fetch_object($q1);
echo ucfirst($res2->status);
		}

?> 