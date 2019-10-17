<?php
 session_start();
// var_dump($_REQUEST);
 if (isset($_SESSION['admin']) =="") {
	header("Location: login.php");
	exit;
}
include "includes/header.php";
$q = $DBcon->query("select * from admin where admin_id =".$_SESSION['admin']);
$row1 = $q->fetch_array() ;
$role = $row1['role'];
$administrator = 'administrator';
$User = 'User';
if($role == $User){ 		
echo "<script language='javascript'>			
window.location.replace('index.php');
</script>";		
exit;
}
if ($_POST['DELETE']) {
		
		$id = $_POST['DELETE'];
		//die();
		
		$q = $DBcon->query("DELETE  FROM `mail` where id ='".$id."'");
		
		$DBcon->query($q);
		
		if($q){		
			$delete=1;		
		}
	}	
	include "includes/upper_navi.php";
	include "includes/left_navi.php"; 
	if($_POST['view']){ $id = $_POST['view']; 
	$q = $DBcon->query("select * from mail where `id`='".$id."' ");
	$row1 = $q->fetch_object();
	$stmt = $DBcon->query("UPDATE mail SET status = 1 WHERE `id`='".$id."'");	
?>	
	<div class="main-wrapper">
		<div class="container-fluid">
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header"><?php echo ucfirst($row1->name); ?></h3>						
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="mails.php">Mail</a><span class="divider"><i class="icon-angle-right"></i></span></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head blue">
							<h3> <?php echo $row1->email ?></h3>
						</div>						
						<div class="tab-pane active" id="comments-post">
							<div class="comment-items">
								<div class="item-block clearfix">
									<div class="item-thumb pull-left">
										<ul>
											<li class="item-pic"><img src="images/item-pic.png" alt="anchor" width="34" height="34"></li>
										</ul>
									</div>
									<div class="item-intro pull-left">
										<p>
											 <?php echo $row1->phone; ?>
										</p>
										<p>
											 <?php echo $row1->message; ?>
										</p>
										<br/>
										<br/>
										<div class="item-meta">
											<ul>
												<li>IP: <?php echo $row1->ip; ?></li>
												<li>Region: <?php echo $row1->region; ?></li>
												<li>City:<?php echo $row1->city; ?></li>
												<li>1 Min ago</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 <?php }else{ ?>
	<div class="main-wrapper">
		<div class="container-fluid">
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Mails List </h3>
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
						<li><a  class="active">Mails List  </a><span class="divider"><i class="icon-angle-right"></i></span></li>
						
					</ul>
				</div>
			</div>
			
            <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets">
						<div>
							<div class="widget-header-block">
								<h4 class="widget-header"> Mails List  </h4>
							</div>
							<div>		<form method="post" action="">
								<table class="responsive table-striped table-bordered tbl-dark-theme">
									<thead>
										<tr>
											<th>
												 SR No.
											</th>
											<th>
												 Name
											</th>
											<th>
												 Email
											</th>
											<th>
												 Phone
											</th>
											<th>
												Message
											</th>
											<th>
												Status
											</th>											
											<th>
												View Detail
											</th>
											<th>
												Mail Delete 
											</th>
											
										</tr>
									</thead>
									<?php $q = $DBcon->query("select * from mail ORDER BY id DESC");
									
										if ($q->num_rows > 0) { ?>
									<tbody>
									<?php 
									$ctr=0; 
									while($row1 =MySQLi_fetch_object($q)){   
									$a=$row1->status;  
									$ap=$row1->admin_permission; 
									$ctr++; 
									?>
										<tr>
											<td>
											
												<?php echo $ctr; ?>									
											</td>
											<td>
												<?php echo ucfirst($row1->name); ?>									
											</td>
											<td>							
												<?php echo $row1->email; ?>
											</td>											
											<td>							
												<?php if($row1->phone) { echo $row1->phone; } else { ?> NA <?php } ?>
											</td>
											<td>							
												<?php $message = substr($row1->message,0,10).'...'; if ($row1->message){   echo $message; } else { ?> NA  <?php } ?>
											</td>
											<td>							
												<?php 
												if($a==0)
												{
													echo	'<span class="label label-important">Unread</span>';
												}
												else
												{
													echo	'<span class="label label-success">Read</span>';
												}
												 ?>
											</td>											
											
											<td>
												<form method="post" action ="" style="margin: 0px;">
													<button type="submit" name="view" value="<?php echo $row1->id; ?>"class="btn btn-info"><i class="icon-user "></i> View</button>
												</form>
											</td>
											<td>
												<form method="post" action ="" style="margin: 0px;">
													<button type="submit" id="DELETE" name="DELETE" value="<?php echo $row1->id; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Mail ?');"><i class="icon-remove"></i> Delete</button>
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
		</div>
	</div>
	

 <?php } include "includes/footer.php"; ?>
	