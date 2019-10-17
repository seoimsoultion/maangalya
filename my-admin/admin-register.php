<?php
 session_start();
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
?>
<!--============j avascript===========-->
		<script type="text/javascript">
            $(function () {
                // validate signup form on keyup and submit
                $("#signupForm").validate({
                    rules: {
                        firstname: "required",
                        lastname: "required",
                        username: {
                            required: true,
                            minlength: 2
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        email: {
                            required: true,
                            email: true
                        },
						role:"required",
                        status: "required",
                    },
                    messages: {
                        firstname: "Please enter your firstname",
                        lastname: "Please enter your lastname",
                        username: {
                            required: "Please enter a username",
                            minlength: "Your username must consist of at least 2 characters"
                        },
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        role: "Please Select Role",
                        status: "Please Select Status",
                    }
                });
            });
        </script>
		
<?php
if ($_POST['DELETE']) {
		
		$id = $_POST['DELETE'];
		
		$query = $DBcon->query("SELECT * FROM admin WHERE admin_id = $id");
			
		$row=$query->fetch_array();
			
		$image = $row[image];
		
		unlink("images/admin/$image");
		
		$q = $DBcon->query("DELETE  FROM `admin` where admin_id ='".$id."'");
		
		$DBcon->query($q);
		
		if($q){		
			$delete=1;		
		}
	}
include "INCLUDE_CLASS_FILE_HERE.php";
	
	if(isset($_POST['update'])) {
		
		$firstname 		=	mysqli_real_escape_string($DBcon,$_POST['firstname']);
		$lastname 		=	mysqli_real_escape_string($DBcon,$_POST['lastname']);
		$username 		=	mysqli_real_escape_string($DBcon,$_POST['username']);
		$email 			=	mysqli_real_escape_string($DBcon,$_POST['email']);
		$role 			=	mysqli_real_escape_string($DBcon,$_POST['role']);
		$status 		=	mysqli_real_escape_string($DBcon,$_POST['status']);
		$id 			= 	mysqli_real_escape_string($DBcon,$_POST['id']);
		
		/*echo "<pre>";
		var_dump($_POST);*/
		
		$errors = array();
		if (empty($firstname)) 
		{
		$errors[] = 'Firstname cannot be blank.';
		}
		if (empty($lastname)) 
		{
		$errors[] = 'lastname cannot be blank.';
		}
		if (empty($username)) 
		{
		$errors[] = 'username cannot be blank.';
		}
		if (empty($email)) 
		{
		$errors[] = 'email cannot be blank.';
		}
		/*if (empty($password)) 
		{
		$errors[] = 'Password cannot be blank.';
		}	*/	
		if (count($errors) >0) 
		{
			foreach ($errors as $error) 
			{
			echo $error;
			}
		} 
	else{		
			$query = $DBcon->query("SELECT * FROM admin WHERE admin_id = $id");
				
			$row=$query->fetch_array();
			
			if( $row[password] == $_POST['password']){
			$password 		= 	$_POST['password'];
			}else{
			$password 		= 	md5($_POST['password']);
			}
			
			$image = $row[image];
			
			$supported_image = array(
				'gif',
				'jpg',
				'jpeg',
				'png'
			);			
			$src_file_name = $_FILES['file']['name'];			
			$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
			if (in_array($ext, $supported_image)) {
				if((isset($_FILES['file']['error']))&&($_FILES['file']['error']==0)){ 
					
					/*  unlink image code hare */
					unlink("images/admin/$row[image]");
					/* End */
					$myImage = new _image;
					// upload image
					$myImage->uploadTo = 'images/admin/'; // SET UPLOAD FOLDER HERE
					$myImage->returnType = 'array'; // RETURN ARRAY OF IMAGE DETAILS
					$img = $myImage->upload($_FILES['file']);
					
					if((file_exists($img['path'].$img['image']))) {
					$image = $img['image']; }
					} else {
					$image = ''; // or set $image to nothing
					}
				}
			else{
				$msg = "<div class='alert alert-danger'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp;Invalid file !
						</div>";
			}
				$num_row = $query->num_rows;
				if($num_row > 0)
				{
					$sql='update `admin` SET `f_name`="'.$firstname.'", `l_name`="'.$lastname.'", `username`="'.$username.'", `email`="'.$email.'", `image`="'.$image.'", `password`="'.$password.'", `role`="'.$role.'", `status`="'.$status.'" WHERE admin_id='.$id;
					
					if ($DBcon->query($sql)) {
						//$_SESSION ['INSERT'] = 1;
						$msg='<div id="success" class="alert alert-success">
									<button data-dismiss="alert" class="close" type="button">×</button>
									<i class="icon-ok-sign"></i><strong>success!</strong> Update successfully  .
								</div>';
						echo "<script language='javascript'>window.location.replace('admin-register.php');</script>";	
					}else {
						$msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
								</div>";
					}
				}			
			$DBcon->close();
		}
	}
	
	
	if (isset($_POST['add']) && $_POST['add']=='add') 
	{
		$firstname 		=	mysqli_real_escape_string($DBcon,$_POST['firstname']);
		$lastname 		=	mysqli_real_escape_string($DBcon,$_POST['lastname']);
		$username 		=	mysqli_real_escape_string($DBcon,$_POST['username']);
		$email 			=	mysqli_real_escape_string($DBcon,$_POST['email']);
		$password 		= 	md5($_POST['password']);
		$role 			=	mysqli_real_escape_string($DBcon,$_POST['role']);
		$status 		=	mysqli_real_escape_string($DBcon,$_POST['status']);	
		/*echo "<pre>";
		var_dump($_POST);*/
		$errors = array();
		if (empty($firstname)) 
		{
		$errors[] = 'Firstname cannot be blank.';
		}
		if (empty($lastname)) 
		{
		$errors[] = 'lastname cannot be blank.';
		}
		if (empty($username)) 
		{
		$errors[] = 'username cannot be blank.';
		}
		if (empty($email)) 
		{
		$errors[] = 'email cannot be blank.';
		}
		if (empty($password)) 
		{
		$errors[] = 'Password cannot be blank.';
		}
		if (empty($role)) 
		{
		$errors[] = 'Please Select Role.';
		}
		if (empty($status)) 
		{
		$errors[] = 'Please Select Status.';
		}
		if (count($errors) >0) 
		{
			foreach ($errors as $error) 
			{
			echo $error;
			}
		} 
	else{		
			$supported_image = array(
				'gif',
				'jpg',
				'jpeg',
				'png'
			);			
			$src_file_name = $_FILES['file']['name'];			
			$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
			if (in_array($ext, $supported_image)) {
				if((isset($_FILES['file']['error']))&&($_FILES['file']['error']==0)){ 
					
					/*  unlink image code hare */
					unlink("images/admin/$row[image]");
					/* End */
					$myImage = new _image;
					// upload image
					$myImage->uploadTo = 'images/admin/'; // SET UPLOAD FOLDER HERE
					$myImage->returnType = 'array'; // RETURN ARRAY OF IMAGE DETAILS
					$img = $myImage->upload($_FILES['file']);
					
					if((file_exists($img['path'].$img['image']))) {
					$image = $img['image']; }
					} else {
					$image = ''; // or set $image to nothing
					}
					$query1 = "INSERT INTO admin(username,password,image,f_name,l_name,email,role,status,date) VALUES('$username','$password','$image','$firstname','$lastname','$email','$role','$status',now())";
					$row1 = $DBcon->query($query1);
					
					if($query1)
					{
						$_SESSION ['INSERT'] = 1;
					}	
					echo "<script language='javascript'>			
							window.location.replace('admin-register.php');
						</script>";	
				}
			else{
				$msg = "<div class='alert alert-danger'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp;Invalid file !
						</div>";
			}		 
		}
	}
?>		
		
		
<?php 	include "includes/upper_navi.php"; 
		include "includes/left_navi.php";
?>
	<div class="main-wrapper">
		<div class="container-fluid">
			<?php if(isset($_POST['edit'])){ $id = $_POST['edit']; ?>
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Admin User Update</h3>						
					</div>
					<ul class="breadcrumb">
						<li><a href="./" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#">Admin</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Admin UserUpdateAdd</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head blue">							
							<h3> Admin User Update</h3>
						</div>
						<div class="widget-container">
							<div class="form-container grid-form form-background">
								<?php 
									$query = $DBcon->query("SELECT * FROM admin WHERE admin_id = $id");
									$row		= $query->fetch_array();
									$id 		= $row[admin_id];	
									$firstname	= $row[f_name];	
									$lastname 	= $row[l_name];	
									$username 	= $row[username];	
									$email 		= $row[email];	
									$password 	= $row[password];	
									$image 		= $row[image];	
									$role 		= $row[role];
									$status 	= $row[status];
								?>
								<form class="form-horizontal left-align" id="signupForm" method="post" action="" enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label">First Name</label>
										<div class="controls">
											<input type="hidden" value="<?php echo $id; ?>" name="id"/>
											<input id="firstname" name="firstname" class="span12" type="text" value="<?php echo $firstname ; ?>"  />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Last Name</label>
										<div class="controls">
											<input id="lastname" name="lastname" type="text" class="span12" value="<?php echo $lastname; ?>" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">User Name</label>
										<div class="controls">
											<input id="username" name="username" type="text" class="span12" value="<?php echo $username; ?>" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Email</label>
										<div class="controls">
											<input id="email" name="email" type="email" class="span12" value="<?php echo $email; ?>" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Password</label>
										<div class="controls">
											<input id="Password" name="password" type="text" class="span12" value="<?php echo $password; ?>" />
											<br/>
											<br/>
											<span style="color:red;">Note : </span><a href="http://www.md5online.org/md5-decrypt.html" target="_blank">Password Decrypt Click This Link</a>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Image</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 150px; height: 100%;">
													<?php if($image ==""){ ?>
													<img src="http://www.placehold.it/715x763/EFEFEF/AAAAAA" alt="img" name="file" />
													<?php }else{ ?>
													<img src="images/admin/<?php echo $image; ?>" alt="img" name="file" />
													<?php } ?>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
												</div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
													<input type="file" name="file" />
													</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Role</label>
											<div class="controls">
												<select id="post-name" name="role" title="Please select your fposition">
													<option value="<?php echo $role; ?>"><?php echo ucfirst($role); ?></option>
													
														<?php   
														if($role == 'administrator')
														{
															
															echo	'<option value="User">User</option>';
														}
														else
														{
															echo 	'
																<option value="administrator">Administrator</option>Administrator';
														}?>
												</select>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label">Status</label>
											<div class="controls">
												<select id="post-name" name="status" title="Please select your fposition">
													<option value="<?php echo $status; ?>">
														<?php  $status;  
														if($status==1)
														{
															echo	'Active';
														}
														else
														{
															echo	'In Active';
														}?> 
													</option>
													<?php 
														if($status==0)
														{
															echo '<option value="1">Active</option>';
														}
														else
														{
															echo '<option value="0">In Active</option>';
														}
														?>
												</select>
											</div>
									</div>
									<div class="form-actions">
										<button type="submit" name="update" value="update" class="btn btn-primary">User Update</button>
										<button type="reset" class="btn">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php }else{ ?>
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Admin User Add</h3>						
					</div>
					<ul class="breadcrumb">
						<li><a href="./" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#">Admin</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Admin User Add</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head blue">							
							<h3> Admin User Add</h3>
						</div>
						<div class="widget-container">
							<div class="form-container grid-form form-background">
								<form class="form-horizontal left-align" id="signupForm" method="post" action="" enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label">First Name</label>
										<div class="controls">
											<input id="firstname" name="firstname" class="span12" type="text" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Last Name</label>
										<div class="controls">
											<input id="lastname" name="lastname" type="text" class="span12" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">User Name</label>
										<div class="controls">
											<input id="username" name="username" type="text" class="span12" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Email</label>
										<div class="controls">
											<input id="email" name="email" type="email" class="span12" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Password</label>
										<div class="controls">
											<input id="Password" name="password" type="password" class="span12" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Image</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 150px; height: 100%;">
												<img src="http://www.placehold.it/395x365/EFEFEF/AAAAAA" alt="img" name="file"/>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
												</div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
													<input type="file" name="file" />
													</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Role</label>
											<div class="controls">
												<select id="post-name" name="role" title="Please select your fposition">
													<option value=""> Select One </option>
													<option value="administrator">Administrator</option>
													<option value="User">User</option>
												</select>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label">Status</label>
											<div class="controls">
												<select id="post-name" name="status" title="Please select your fposition">
													<option value=""> Select One </option>
													<option value="1">Active</option>
													<option value="0">In Active</option>
												</select>
											</div>
									</div>
									<div class="form-actions">
										<button type="submit" name="add" value="add" class="btn btn-primary">User Add</button>
										<button type="reset" class="btn">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Admin User List </h3>
					</div>
				</div>
			</div>
            <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets">
						<form method="post" action="">
							<table class="responsive table-striped table-bordered tbl-dark-theme">
								<thead>
									<tr>
										<th>
											 SR No.
										</th>
										<th>
											 IMAGE
										</th>
										<th>
											First Name
										</th>
										<th>
											Last Name
										</th>
										<th>
											User Name
										</th>
										<th>
											Email
										</th>
										<th>
											Role
										</th>
										<th>
											Status
										</th>											
										<th>
											Edit
										</th>
										<th>
											Delete 
										</th>
										
									</tr>
								</thead>
								<?php $q = $DBcon->query("select * from admin ORDER BY admin_id DESC");
								if ($q->num_rows > 0) { ?>
								<tbody>
								<?php 
								$ctr=0; 
								while($row1 =MySQLi_fetch_object($q)){  
								$a=$row1->status;  
								$ctr++; 
								?>
									<tr>
										<td>
										
											<?php echo $ctr; ?>									
										</td>
										<td>							
											<img width="50px;" height="50px;" src="images/admin/<?php  echo $row1->image; ?>"/>
										</td>
										<td>
											<?php echo ucfirst($row1->f_name); ?>									
										</td>
										<td>							
											<?php echo ucfirst($row1->l_name); ?>
										</td>										
										<td>							
											<?php echo ucfirst($row1->username); ?>
										</td>
										<td>							
											<?php echo $row1->email; ?>
										</td>									
										
										<td>							
											<?php echo ucfirst($row1->role); ?>
										</td>
										<td>							
												<?php 
												if($a==1)
												{
													echo	'<span class="label label-success">Active</span>';
												}
												else
												{
													echo	'<span class="label label-important">In Active</span>';
												}
												 ?>
										</td>
										<td>
											<form method="post" action ="" style="margin: 0px;">
												<button type="submit" name="edit" value="<?php echo $row1->admin_id; ?>"class="btn btn-info"><i class="icon-user "></i>Edit</button>
											</form>
										</td>
										<td>
											<form method="post" action ="" style="margin: 0px;">
												<button type="submit" id="DELETE" name="DELETE" value="<?php echo $row1->admin_id; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User ?');"><i class="icon-remove"></i> Delete</button>
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
	<?php } include "includes/footer.php"; ?>
	