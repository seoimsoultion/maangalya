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
		
		$q = $DBcon->query("DELETE  FROM `register_channel_partner` where id ='".$id."'");
		
		$DBcon->query($q);
		
		if($q){		
			$delete=1;		
		}
	}	
	include "includes/upper_navi.php";
	include "includes/left_navi.php"; 
?>
	<div class="main-wrapper">
		<div class="container-fluid">
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Lead List </h3>
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
						<li><a  class="active">Lead List  </a><span class="divider"><i class="icon-angle-right"></i></span></li>
						
					</ul>
				</div>
			</div>
			
            <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets">
						<div>
							<div class="widget-header-block">
								<h4 class="widget-header">Lead List  </h4>
							</div>
							<div>		<form method="post" action="">
								<table class="responsive table-striped table-bordered tbl-dark-theme">
									<thead>
										<tr>
											<th>
												 SR No.
											</th>
											<th>
												 Partner Id 
											</th>
											<th>
												 Customer Contact Number
											</th>
											<th>
												 Customer Name
											</th>
											<th>
												 Email
											</th>
											<th>
												 Project
											</th>
											<th>
												Notes
											</th>
										</tr>
									</thead>
									<?php $q = $DBcon->query("select * from lead ORDER BY id DESC");
									
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
												<?php echo ucfirst($row1->partner_id); ?>									
											</td>
											<td>
												<?php echo ucfirst($row1->customer_contact_number); ?>
											</td>
											<td>
												<?php echo ucfirst($row1->customer_name); ?>
											</td>
											
											<td>							
												<?php echo $row1->customer_email; ?>
											</td>											
											<td>							
												<?php echo $row1->project; ?>
											</td>											
											<td>							
												<?php echo $row1->notes; ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
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
	