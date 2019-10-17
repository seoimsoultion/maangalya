<?php
		/*var_dump($_REQUEST);
        //  echo "<pre>";
          print_r($_REQUEST);
          //print_r($_FILES);
		 
		  //echo $disable  = $_REQUEST['disable'];
		   die();*/
 session_start();
// var_dump($_REQUEST);
 if (!empty($_SESSION['admin']))
 { 
 include "includes/header.php"; 
		include "includes/db.php"; 

if ($_POST['DELETE']) {
		
		$id = $_POST['DELETE'];
		//die();
		
		$sql	=	mysql_query("select * from recipe where user_id ='".$id."'");
				
		while($row1 = mysql_fetch_array($sql)){	
		
			$recipe_id = $row1[id];	
			
			$q = "DELETE  FROM `ingredient` where 	recipe_id ='".$recipe_id."'";
			
			mysql_query($q);
			
			$q = "DELETE  FROM `instruction` where 	recipe_id ='".$recipe_id."'";
			
			mysql_query($q);
			
			$q = "DELETE  FROM `recipe` where id ='".$recipe_id."'";
			
			$del = mysql_query($q);
			
			unlink("../images/recipeimage/$row[rec_image]");		
		
		}		
		
		$q = "DELETE  FROM `user` where id ='".$id."'";
		
		mysql_query($q);
		
		if($q){		
			$delete=1;		
		}
	}

if (isset($_POST['disable'])) 
{
$disable  = $_REQUEST['disable'];	
	
$q=mysql_query("select * from `user` where `id`='$disable'");
if (mysql_num_rows($q)>0) {
	//echo mysql_num_rows($q);
	$res=mysql_fetch_object($q);
	
    /* echo $res->admin_permission;
	 die();*/
	 if ($res->admin_permission=='enable') {
		 mysql_query("update  `user` set `admin_permission`='disable' where `id`='$disable'");
	 }else {
		 mysql_query("update  `user` set `admin_permission`='enable' where `id`='$disable'");
	 }
/*	 
$q1=mysql_query("select * from `user` where `id`='$disable'");
	$res2=mysql_fetch_object($q1);
echo ucfirst($res2->admin_permission);*/
	}
}		
    

 include "includes/upper_navi.php";
 include "includes/left_navi.php"; ?>

	<div class="main-wrapper">
		<div class="container-fluid">
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">User List </h3>
						<?php  
							if ($delete==1 )
							{ 
							echo '<div id="success" class="alert alert-success">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<i class="icon-ok-sign"></i><strong>success!</strong> Delete successfully  .
							</div>';
							$msg=0;
							} 
							?>
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a  class="active">User List  </a><span class="divider"><i class="icon-angle-right"></i></span></li>
						
					</ul>
				</div>
			</div>
			
            <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets">
						<div>
							<div class="widget-header-block">
								<h4 class="widget-header">  User List  </h4>
							</div>
							<div>		
							<form method="post" action="">
								<table class="responsive table-striped table-bordered tbl-dark-theme">
									<thead>
										<tr>
											<th>
												 SR No.
											</th>
											<th>
												 Username
											</th>
											<th>
												 Image
											</th>
											<th>
												 Email
											</th>
											<th>
												 Phone
											</th>
											<th>
												User Status
											</th>
											<th>
												Admin Permission
											</th>
											<th>
												View User
											</th>
											<th>
												User Delete 
											</th>
											
										</tr>
									</thead>
									<?php $q = mysql_query("select * from user ORDER BY id DESC");
									
										if (mysql_num_rows($q) > 0) { ?>
									<tbody>
									<?php 
									$ctr=0; 
									while($row1 = mysql_fetch_object($q)){   
									$a=$row1->active;  
									$ap=$row1->admin_permission; 
									$ctr++; 
									?>
										<tr>
											<td>
											
												<?php echo $ctr; ?>									
											</td>
											<td>
												<?php echo $row1->username; ?>									
											</td>
											
											
											
											<td>							
												<?php
												if (!empty($row1->image)) {
													?>
													<img src="../timthumb.php?src=http://socialkitchen.co.in/images/profile/<?php echo $row1->image; ?>&w=50&h=50" alt="<?php echo $row1->username; ?>" />
													<?php
												}else {
													?>
													<img src="../timthumb.php?src=http://socialkitchen.co.in/no-recipe.gif&w=50&h=50" alt="<?php echo $row1->username; ?>" />
													<?php
												}
												?>
											</td>
											<td>							
												<?php echo $row1->email; ?>
											</td>
											
											<td>							
												<?php if($row1->phone) { echo $row1->phone; } else { ?> NA <?php } ?>
											</td>
											
											<td>
											
												<?php 
												if($a==1)
												{
													echo	' 	<span class="label label-success">Active</span>';
												}
												else
												{
													echo	'<span class="label label-important">Away</span>';
												}
												 ?>
											</td>
											<td>
											<?php 
												if($ap=='enable')
												{?>
													<form action="" method="post">
													<button type="submit" value="<?php echo $row1->id; ?>" style="background:green;" id="<?php echo $row1->id; ?>" name="disable" class="btn btn-info Pending" onclick="return confirm('Are you sure you want to disable this User ?');"><i class="icon-unlock"></i><?php echo ucfirst($row1->admin_permission); ?></button>
												</form>	
													
												<?php 
												}
												else
												{
												?>
												<form action="" method="post">
												<button type="submit" value="<?php echo $row1->id; ?>" style="background:red;" id="<?php echo $row1->id; ?>" name="disable" class="btn btn-info Approved"><i class="icon-lock"></i><?php echo ucfirst($row1->admin_permission); ?></button>
												</form>													
											<?php } ?>											
											</td>
											<td>
												<form method="post" action ="user-profile.php" target="_blank" style="margin: 0px;">
													<button type="submit" name="view" value="<?php echo $row1->id; ?>"class="btn btn-info"><i class="icon-user "></i> View</button>
												</form>
											</td>
											<td>
												<form method="post" action ="" style="margin: 0px;">
													<button type="submit" id="DELETE" name="DELETE" value="<?php echo $row1->id; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User ?');"><i class="icon-remove"></i> Delete</button>
												</form>
											</td>
										</tr>
										<?php } ?>
									</tbody><?php } ?>
								</table>
								</form>
							</div>
						</div>
					</div>	
				</div>
			</div>


	<?php include "includes/footer.php"; ?>
	<script type="text/javascript">
   /* $(document).ready(function(){
		//var mid=$('.pp')val();
        $("button").click(function(){
		var i =	this.id;
            $.ajax({
                type: 'POST',
                url: 'script.php',
				 data: "id=" + $(this).attr("id"), 
                success: function(data) {
               //     alert(data); 
				//	alert(i);
					var j='#'+i;
                    //$("p").text(data);
					$(j).text(data);
					//(this.id).text(data);
                }
            });
   });
});*/
</script>
	<?php
	}
	else
	{
	header("Location: login.php");
	}
	?>
	