<?php 
	include "includes/db.php";
	$q = mysql_query("select * from admin");
	$row1 = mysql_fetch_object($q) 
?>
	<div class="leftbar leftbar-close clearfix">
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
					<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'index.php')) echo 'class="active"';?>><a href="#main"  class="icon-desktop" style="width:105px;" title="Dashboard"></a></li>
					<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_microsite.php'))	{ echo 'class="active"';}
					else if (strpos($_SERVER['SCRIPT_NAME'], 'meta_insert.php'))		{ echo 'class="active"';}
					else if (strpos($_SERVER['SCRIPT_NAME'], 'add_navigations.php')) 	{ echo 'class="active"'; }
					else if (strpos($_SERVER['SCRIPT_NAME'], 'add_microdetail.php')) 	{ echo 'class="active"'; }
					else if (strpos($_SERVER['SCRIPT_NAME'], 'microdetail_list.php')) 	{ echo 'class="active"'; }
					?> ><a href="#microsite"  title="microsite">Microsite</a></li>
					<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_builder.php')) echo 'class="active"';  ?>><a href="#builder"  title="Builder">Builder</a></li>
					<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_amenities.php')) echo 'class="active"';  ?>><a href="#Amenities"  title="Amenities">Amenities</a></li>
					<li><a href="#Specification"  title="Specification">Specification</a></li>
					<li><a href="#floorplan"  title="floorplan">Floorplan</a></li>					
					<li><a href="#advertise"  title="advertise">Advertise</a></li>
					<li><a href="#FeatureImage"  title="Featureproperties">Feature </a></li>
					<li><a href="#property"  title="property">Property </a></li>
					<li><a href="#blog"  title="Blog">Blog</a></li>
					<li><a href="#approvals"  title="Approvals">Approvals</a></li>
				</ul>
			</div>
			<div class="responsive-leftbar">
				<i class="icon-list"></i>
			</div>
			<div class="left-secondary-nav tab-content">
				<div class="tab-pane" id="main">
				<a href="./" ><h4 class="side-head">Dashboard</h4></a>
				</div>
				<div 
				<?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_microsite.php')) { echo 'class="active"'; } 
				else if (strpos($_SERVER['SCRIPT_NAME'], 'meta_insert.php')) { echo 'class="active"'; }
				else if (strpos($_SERVER['SCRIPT_NAME'], 'add_navigations.php')) { echo 'class="active"'; }
				else if (strpos($_SERVER['SCRIPT_NAME'], 'add_microdetail.php')) { echo 'class="active"'; }
				else if (strpos($_SERVER['SCRIPT_NAME'], 'microdetail_list.php')) { echo 'class="active"'; }
				else{ echo "class='tab-pane' "; } ?> 
				id="microsite" >
					<h4 class="side-head">microsite</h4>
					<ul id="nav" class="accordion-nav">
						<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_microsite.php'))  echo 'class="active"'; ?>><a href="add_microsite.php">Add microsite </a></li>						
						<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'meta_insert.php'))  echo 'class="active"'; ?>><a href="meta_insert.php">Add Meta Tag </a></li>
						<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_navigations.php'))  echo 'class="active"'; ?>><a href="add_navigations.php">Add-Navigation</a></li>
						<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_microdetail.php'))  echo 'class="active"'; ?>><a href="add_microdetail.php">Add microsite detail </a></li>
						<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'microdetail_list.php'))  echo 'class="active"'; ?>><a href="microdetail_list.php">microsite detail list </a></li>
					</ul>
				</div>	
				<div <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_builder.php')) { echo 'class="active"'; } 
							else{ echo " class='tab-pane' "; } ?>  id="builder">
					<h4 class="side-head">Add Builder</h4>
					<ul id="nav" class="accordion-nav">
						<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_builder.php')) echo 'class="active"';  ?>><a href="add_builder.php">Add-Builder</a></li>
					</ul>
				</div>
				<div <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_amenities.php')) { echo 'class="active"'; } 
							else{ echo " class='tab-pane' "; } ?> id="Amenities">
					<h4 class="side-head">Amenities</h4>
					<ul id="nav" class="accordion-nav">
						<li <?php if (strpos($_SERVER['SCRIPT_NAME'], 'add_amenities.php')) echo 'class="active"';  ?>><a href="add_amenities.php">Add Amenities </a></li>
						</a></li>
					</ul>
				</div>
				<div class="tab-pane" id="Specification">
					<h4 class="side-head">Specification</h4>
					<ul id="nav" class="accordion-nav">
					<li><a href="add_specifications.php">Add Specification </a></li>
						<li><a href="add_specification.php">Add Specification detail</a></li>
					</ul>
				</div>
				<div class="tab-pane" id="floorplan">
					<h4 class="side-head">floorplan</h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="add_floorplan.php">Add floorplan </a></li>						
					</ul>
				</div>								
				<div class="tab-pane" id="advertise">
					<h4 class="side-head">Advertise </h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="add_advertise.php">Add Advertise  </a></li>
					</ul>
				</div>
				<div class="tab-pane" id="FeatureImage">
					<h4 class="side-head">Feature </h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="add_portfolio.php">Add Feature Properties </a></li>
					</ul>
				</div>
				<div class="tab-pane" id="property">
					<h4 class="side-head">Property</h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="add_proptype.php">Add Property type </a></li>
						<li><a href="add_propstatus.php">Add Property status </a></li>
					</ul>
				</div>
				<div class="tab-pane" id="blog">
					<h4 class="side-head">Blog</h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="add_blog.php">Add Blog </a></li>
						<li><a href="add_blogcat.php">Add Blog Category </a></li>
					</ul>
				</div>
				<div class="tab-pane" id="approvals">
					<h4 class="side-head">Approvals</h4>
					<ul id="nav" class="accordion-nav">
						<li><a href="add_bankapp.php">Add Bankapproval </a></li>
						<li><a href="add_legalapp.php">Add Legalapproval </a></li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>