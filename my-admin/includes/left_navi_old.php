<?php 
include "includes/db.php";
$q = mysql_query("select * from admin");
						$row1 = mysql_fetch_object($q) 
						?><div class="leftbar leftbar-close clearfix">
		<div class="admin-info clearfix">
			<div class="admin-thumb">
				<img class="thumb" src="images/admin/<?php echo $row1->thumb_img; ?>">
			</div>
			
			<div class="admin-meta">
				<ul>
					<!--<li class="admin-username"><//?php echo ucfirst($row1->f_name); ?> &nbsp;	<//?php  echo  ucfirst($row1->l_name); ?></li>-->
					<li class="admin-username">MY LandMark</li>
					<li><a href="admin_update.php">Edit Profile</a></li>
					<li><a href="admin_profile.php">View Profile </a><a href="logout.php"><i class="icon-lock"></i> Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="left-nav clearfix">
			<div class="left-primary-nav">
				<ul id="myTab">
					<li class="active"><a href="#main"  class="icon-desktop" style="width:105px;" title="Dashboard"></a></li>					
					<li><a href="#blog"  title="Blog">Blog</a></li>
				</ul>
			</div>
			<div class="responsive-leftbar">
				<i class="icon-list"></i>
			</div>
			<div class="left-secondary-nav tab-content">
				<div class="tab-pane active" id="main">
				<a href="./" ><h4 class="side-head">Dashboard</h4></a>
				</div>
				
				<div class="tab-pane" id="blog">
					<h4 class="side-head">Blog</h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="add_blog.php">Add Blog </a></li>
						<li><a href="add_blogcat.php">Add Blog Category </a></li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>