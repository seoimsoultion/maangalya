<?php
 session_start();
 if (isset($_SESSION['admin']) =="") {
	header("Location: login.php");
	exit;
} ?>
<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
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
                        confirm_password: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        topic: {
                            required: "#newsletter:checked",
                            minlength: 2
                        },
                        agree: "required"
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
                        confirm_password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long",
                            equalTo: "Please enter the same password as above"
                        },
                        email: "Please enter a valid email address",
                        agree: "Please accept our policy"
                    }
                });
            });
        </script>
		
<?php
include "INCLUDE_CLASS_FILE_HERE.php";
		
	$firstname 		=	(isset($_POST['firstname']))?trim($_POST['firstname']):'';
	$lastname 		=	(isset($_POST['lastname']))?trim($_POST['lastname']):'';
	$username 		=	(isset($_POST['username']))?trim($_POST['username']):'';
	$email 			=	(isset($_POST['email']))?trim($_POST['email']):'';
	$id				=	$_POST['id'];

	if (isset($_POST['edit']) && $_POST['edit']=='update') 
	{
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
					 $query1='update `admin` SET `f_name`="'.$firstname.'", `l_name`="'.$lastname.'", `username`="'.$username.'", `email`="'.$email.'", `image`="'.$image.'"';
					$row1 = $DBcon->query($query1);
					
					if($query1)
					{
						$_SESSION ['INSERT'] = 1;
					}	
					echo "<script language='javascript'>			
							window.location.replace('admin_profile.php');
						</script>";				
				}
		}
	}
?>		
		
		
<?php include "includes/upper_navi.php"; ?>
<?php include "includes/left_navi.php"; ?>
	<div class="main-wrapper">
		<div class="container-fluid">
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Admin Update</h3>						
					</div>
					<ul class="breadcrumb">
						<li><a href="./" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#">Admin</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Admin Update</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head blue">							
							<h3> Admin Update</h3>
						</div>
						<?php	$q = $DBcon->query("select * from admin where admin_id=".$_SESSION['admin']);
								if ($q->num_rows > 0) {
								while ($row1 = $q->fetch_object()) { 
						?>
						<div class="widget-container">
							<div class="form-container grid-form form-background">
								<form class="form-horizontal left-align" id="signupForm" method="post" action="" enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label">First Name</label>
										<div class="controls">
										 <input type="hidden" value="<?php echo $row1->admin_id; ?>" name="id"/>
											<input id="firstname" name="firstname" class="span12" type="text" value="<?php echo $row1->f_name; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Last Name</label>
										<div class="controls">
											<input id="lastname" name="lastname" type="text" class="span12" value="<?php echo $row1->l_name; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">User Name</label>
										<div class="controls">
											<input id="username" name="username" type="text" class="span12" value="<?php echo $row1->username; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Email</label>
										<div class="controls">
											<input id="email" name="email" type="email" class="span12" value="<?php echo $row1->email; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Image</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 150px; height: 100%;">
												<?php if($row1->image == "") { ?>	
													<img src="http://www.placehold.it/395x365/EFEFEF/AAAAAA" alt="img" name="file"/>
												<?php }else{ ?>
													<img src="images/admin/<?php echo $row1->image; ?>" alt="img"/>
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
									<div class="form-actions">
										<button type="submit" name="edit" value="update" class="btn btn-primary">Update</button>
										<button type="reset" class="btn">Cancel</button>
									</div>
								</form>
							</div>
						</div><?php } } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "includes/footer.php"; ?>
	