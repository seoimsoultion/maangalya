<?php 
		/*var_dump($_REQUEST);
          echo "<pre>";
          print_r($_REQUEST);
          //print_r($_FILES);
		   die();*/
session_start();
 if (!empty($_SESSION['admin']))
 { 
	include "includes/header.php"; 
	include "includes/db.php";
	include "includes/upper_navi.php"; 
	include "includes/left_navi.php";   
	
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
	
?>
<script type="text/javascript">
$(function(){
  $('#container').masonry({
    // options
    itemSelector : '.item',
	columnWidth : 240
  });
});
</script>
<style>
.item{ width:220px; margin:10px; float:left;}
.item{ margin-left:0px !important; margin-top:0px !important; margin-bottom:20px !important;}
.masonry,
.masonry .masonry-brick {
  -webkit-transition-duration: 0.7s;
     -moz-transition-duration: 0.7s;
      -ms-transition-duration: 0.7s;
       -o-transition-duration: 0.7s;
          transition-duration: 0.7s;
}
.masonry {
  -webkit-transition-property: height, width;
     -moz-transition-property: height, width;
      -ms-transition-property: height, width;
       -o-transition-property: height, width;
          transition-property: height, width;
}
.masonry .masonry-brick {
  -webkit-transition-property: left, right, top;
     -moz-transition-property: left, right, top;
      -ms-transition-property: left, right, top;
       -o-transition-property: left, right, top;
          transition-property: left, right, top;
}
</style>
  <div class="main-wrapper">
    <div class="container-fluid">
      <div class="row-fluid ">
        <div class="span12">
          <div class="primary-head">
            <h3 class="page-header">User Profile</h3>            
          </div>
          <ul class="breadcrumb">
            <li class="active">Profile</li>
          </ul>
        </div>
      </div>
	   <?php 
	   $id = $_POST['view']; 
	   
		$a= mysql_query('SELECT COUNT(*) as demo FROM recipe,user where user.id= recipe.user_id and user.id="'.$id.'"');
		$count=mysql_fetch_object($a);
		
		$b= mysql_query('SELECT COUNT(*) as demo FROM recipe,user where recipe.status = "pending" and user.id= recipe.user_id and user.id="'.$id.'"');
		$count2=mysql_fetch_object($b);
		
		$c= mysql_query('SELECT COUNT(*) as demo FROM recipe,user where recipe.status = "approved" and user.id= recipe.user_id and user.id="'.$id.'"');
		$count3=mysql_fetch_object($c);
							
		
		$q = mysql_query("select * from user where id = $id ");
				if (mysql_num_rows($q) > 0) {
				$row1 = mysql_fetch_object($q);
				$a=$row1->active;  
				$ap=$row1->admin_permission; 
		?>
      <div class="row-fluid ">
        <div class="span3">
          <?php
			if (!empty($row1->image)) {
				?>
				<div class="profile-thumb"> <img class="img-polaroid" src="../timthumb.php?src=http://socialkitchen.co.in/images/profile/<?php echo $row1->image; ?>&w=140&h=140" alt="<?php echo $row1->username; ?>">				
				<?php
			}else {
				?>
				<img src="../timthumb.php?src=http://socialkitchen.co.in/no-recipe.gif&w=140&h=140" alt="<?php echo $row1->username; ?>" />
				<?php
			}
			?>
		  
          </div>
        </div>		
        <div class="span9">
          <div class="profile-info">
            <div class="tab-widget">
              <div class="tab-content">
                <div class="tab-pane active" id="user">
                <div class=" information-container">
                  <h4>About <?php echo ucfirst($row1->username); ?></h4>                  
                  <p><?php if($row1->about) { echo ucfirst($row1->about); } else { ?> NA <?php } ?></p>
                  <h4>Basic Info</h4>
				  <ul class="profile-intro">
					<li>
					  <label>Name:</label>
				<?php if($row1->name) { echo $row1->name; } else { ?> NA <?php } ?></li>
					<li>
					<li>
					  <label>Email:</label>
					   <?php echo $row1->email;  ?></li>
					<li>
					  <label>Username:</label>
					  <?php echo ucfirst($row1->username);  ?></li>
					  <li>
					  <label>Phone:</label>
					   <?php if($row1->phone){ echo $row1->phone; } else{ ?> NA <?php } ?></li>
					   <li>
					  <label>Pending Recipes:</label>
					  <span class="badge badge-warning"><?php echo $count2->demo; ?></span></li> 
					   <li>
					  <label>Approved Recipes:</label>
					   <span class="badge badge-success"><?php echo $count3->demo; ?></span></li>
					   <li>					  
					  <label>Create Total Recipes:</label>
					   <span class="badge badge-info"><?php echo $count->demo; ?></span></li>
					<li>
					  <label>User Status</label>
					 <?php 
						if($a==1)
						{
							echo	' 	<span class="label label-success">Active</span>';
						}
						else
						{
							echo	'<span class="label label-important">Away</span>';
						}
						 ?></li>
						 
					<li>
					  <label>Admin Permission:</label>
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
					<?php } ?></li>
					<li>
					  <label>User Delete :</label>
						<form method="post" action ="" style="margin: 0px;">
							<button type="submit" id="DELETE" name="DELETE" value="<?php echo $row1->id; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User ?');"><i class="icon-remove"></i> Delete</button>
						</form></li>
				  </ul> 
				</div>    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <?php } ?>
					<h4>Recipes</h4>
					<div class="row-fluid">					
						<div class="span12">						
							<div id="container">
					<?php 	$q1 = mysql_query("SELECT *FROM `recipe` WHERE user_id =$id ORDER BY id DESC");	
							if (mysql_num_rows($q1) > 0) { 
							while($row2 = mysql_fetch_object($q1)){ 
							
							$title=htmlentities($row2->tittle);
							$urltitle=preg_replace('/[^a-z0-9]/i',' ', $title);
							$newurltitle=str_replace(" ","-",$title);
							$adminurl=$newurltitle;
							$recipeurl="http://socialkitchen.co.in/admin-show/$adminurl";
							
							?>
								<div class="item">
									<div class="thumbnail">
										<?php
											if (!empty($row2->rec_image)) {
												$rec_image = explode(',', $row2->rec_image);
												?>
												<img alt="<?php echo $row2->tittle; ?>" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="../timthumb.php?src=http://socialkitchen.co.in/images/recipeimage/<?php echo $rec_image[0]; ?>&w=300&h=200">												
												<?php
											}else {
												?>
												<img src="../timthumb.php?src=http://socialkitchen.co.in/no-recipe.gif&w=300&h=200" alt="<?php echo $row2->tittle; ?>" style="height: 200px;" />
												<?php
											}
											?>
										<div class="caption">
											<h3><?php  $tittle = substr($row2->tittle,0,10).'...';    echo $tittle; ?></h3>
											<p>
												<?php  $desc = substr($row2->desc,0,50).'...';  echo $desc;  ?>
											</p>
											<p>
												<a class="btn btn-primary" target="_blank" href="<?php echo $recipeurl;?>">View</a>
											</p>
										</div>
									</div>
								</div>
							<?php } } ?>
							</div>
						</div>
					</div>	
    </div>
  </div>
  <?php include "includes/footer.php";
		}else
			{
			header("Location: login.php");
			}
  ?>