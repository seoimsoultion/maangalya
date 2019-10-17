<?php
 session_start();
 if (isset($_SESSION['admin']) =="") {
	header("Location: login.php");
	exit;
}?>
 <script src="js/jquery.js"></script>
<?php include "includes/header.php"; ?>
<?php include "includes/upper_navi.php"; ?>
<?php include "includes/left_navi.php"; ?>
<?php include "includes/db.php"; $q = $DBcon->query("select * from admin where admin_id =".$_SESSION['admin']);  $row1 = $q->fetch_object(); ?>
	<div class="main-wrapper">
		<div class="container-fluid">
			<div class="row-fluid ">
				<div class="span12">
				  <div class="primary-head">
					<h3 class="page-header">Admin Profile</h3>
				  </div>
				  <ul class="breadcrumb">
					<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
					<li><a href="#">Admin</a><span class="divider"><i class="icon-angle-right"></i></span></li>
					<li class="active">Profile</li>
				  </ul>
				</div>
			</div>
			<div class="row-fluid ">
					<div class="span3">
					  <div class="profile-thumb"> 
						<?php if($row1->image ==""){ ?>
						<img class="img-polaroid" src="http://islamicinformationcentre.com/images/iic-logo.png" style="background-color:black; width:100%;">
						<?php }else{ ?>
						<img class="img-polaroid" src="images/admin/<?php echo $row1->image; ?>">
						<?php } ?>
						<ul class="list-item">
						  <li><a href="admin_update.php"><i class="icon-pencil"></i> Edit Profile </a></li>
						  <li><a href="change_password.php"><i class="icon-pencil"></i> Change Password </a></li>
						</ul>
					  </div>
					</div>
				<div class="span9">
					<div class="profile-info">
						<div class="tab-widget">
							<?php if($_SESSION ['INSERT']==1){ ?>
							<div id="success" class="alert alert-success">
								<button data-dismiss="alert" class="close" type="button">×</button>
								<i class="icon-ok-sign"></i><strong>success!</strong> Update successfully  .
							</div>
							<?php $_SESSION ['INSERT']=0; }  ?>
							  <ul class="nav nav-tabs" id="myTab1">
								<li class="active"><a href="#user"><i class="icon-user"></i> Profile Info</a></li>
							  </ul>
							<div class="tab-content">
								<div class="tab-pane active" id="user">
									<div class=" information-container">
									  <h4>Basic Info</h4>
										<ul class="profile-intro">
											<li>
											  <label>First Name:</label>
											 <?php echo ucfirst($row1->f_name); ?> 
											</li>
											<li>
											  <label>Last Name:</label>
											 <?php echo ucfirst($row1->l_name); ?>
											</li>
											<li>
											  <label>last Login:</label>
											 <?php echo date('d-m-Y h:i:s', strtotime($row1->last_login)); ?>
											</li>
											<li>
											  <label>Email:</label>
											 <?php echo $row1->email; ?>
											 </li>
											<li>
											  <label>Username:</label>
											 <?php echo ucfirst($row1->username); ?>
											</li>								
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
  <?php include "includes/footer.php"; ?>