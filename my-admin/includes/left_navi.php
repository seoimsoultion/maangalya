<?php 
	$q = $DBcon->query("select * from admin where admin_id =".$_SESSION['admin']);
	$row1 = $q->fetch_array() ;
	$role = $row1['role'];
	$administrator = 'administrator';
	$User = 'User';
?>
	<div class="leftbar leftbar-close clearfix">
		<div class="admin-info clearfix">
			<div class="admin-thumb">
				<?php if($row1[image] ==""){ ?>
				<img class="thumb" src="http://demo.imsolutions.co/foodsandnutrition/images/logo.jpg" alt="" style="width:50px; height:50px;background-color:black;" />
				<?php }else{ ?>
				<img class="thumb" src="images/admin/<?php echo $row1[image]; ?>" alt="" style="width:100%; height:100%;" />
				<?php } ?>
			</div>
			
			<div class="admin-meta">
				<ul>
					<li class="admin-username"><?php echo ucfirst($row1[username]); ?></li>
					<li><a href="admin_update.php">Edit Profile</a></li>
					<li><a href="admin_profile.php">View Profile </a><a href="logout.php?logout"><i class="icon-lock"></i> Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="left-nav clearfix">
			<div class="left-primary-nav">
				<ul id="myTab">
					
					<?php if($role == $administrator ){ ?><li><a href="#Admin"  title="Event">Admin</a></li><?php } ?>
                                        <li class="active"><a href="#Event"  title="Event">Partner List</a></li>
					<li><a href="#Lead"  title="Lead">Lead List</a></li>
				</ul>
			</div>
			<div class="responsive-leftbar">
				<i class="icon-list"></i>
			</div>
			<div class="left-secondary-nav tab-content">
				
				<?php if($role == $administrator ){ ?>	
				<div class="tab-pane" id="Admin">
					<h4 class="side-head">Admin</h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="admin-register.php">Add User  </a></li>
					</ul>
				</div>
				<?php } ?>
				<div class="tab-pane active" id="Event">
					<h4 class="side-head">Partner List </h4>
					<ul id="nav" class="accordion-nav">
                                            <li class="active"><a class="active" href="register_channel_partner.php">Partner List </a></li>
					</ul>
				</div>
				<div class="tab-pane" id="Lead">
					<h4 class="side-head">Lead List </h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="lead.php">Lead List </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>