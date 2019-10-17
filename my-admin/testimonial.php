<?php
 session_start();
 if (isset($_SESSION['admin']) =="") {
	header("Location: login.php");
	exit;
} ?>
<?php include "includes/header.php"; ?>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/date.js"></script>
<script src="js/daterangepicker.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({
            pickDate: false
        });
    });$(function () {
       
	   $('#datetimepicker33').datetimepicker({
            pickDate: false
        });
    });
    $(function () {
        $('#datetimepicker4').datetimepicker({
            pickTime: false
        });
    });
</script>

<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/en.js"></script>
<style>
form {
margin: 0;
}
textarea {
display: block;
}
</style>
<script type="text/javascript">
	$(function () {                
		$("#signupForm").validate({
			rules: {
				name : "required",
				designation : "required",
				email : "required",
				file: "required",
				status: "required",
				message: {
                required: true
				},
			},
			messages: {
				name 	: "Name cannot be blank",
				designation : "designation cannot be blank",
				gender : "gender cannot be blank",
				email : "Emailcannot be blank",
				file:"Please Select Image",
				status:"Please Select Status",
				message: {
                required: "Enter your message 3-20 characters"
				}
			}
		});
	});
	$(function () {                
		$("#update-signupForm").validate({
			rules: {
				name : "required",
				status: "required",
				detail: {
                required: true,
                minlength: 5,
                maxlength: 30,
                lettersonly: true
				},
			},
			messages: {
				name 	: "Tittle cannot be blank",
				status:"Please Select Status",
				detail: {
                required: "Enter your message 3-20 characters"
				}
			}
		});
	});
</script>
<script>
var editor;
KindEditor.ready(function(K) {
editor = K.create('textarea[name="detail"]', {
allowFileManager : true

});
});

KindEditor.ready(function(K) {
editor = K.create('textarea[name="detail"]', {
langType : 'en'
});
});

</script>
<?php 
include "INCLUDE_CLASS_FILE_HERE.php";
include "includes/upper_navi.php"; 
include "includes/left_navi.php"; 

if ($_POST['DELETE']) {
		
		$id = $_POST['DELETE'];
		
		$query = $DBcon->query("SELECT * FROM testimonial WHERE testimonial_id = $id");
			
		$row=$query->fetch_array();
			
		$image = $row[causes_image];
		
		unlink("../images/testimonial/$image");
		
		$q = $DBcon->query("DELETE  FROM `testimonial` where testimonial_id ='".$id."'");
		
		$DBcon->query($q);
		
		if($q){		
			$delete=1;		
		}
	}

if(isset($_POST['update_testimonial'])) {
			/*echo "<pre>";		
			var_dump($_POST);
			var_dump($_FILES);
			die();*/
			$name 						= mysqli_real_escape_string($DBcon,$_POST['name']);
			$gender 					= mysqli_real_escape_string($DBcon,$_POST['gender']);	
			$email 						= mysqli_real_escape_string($DBcon,$_POST['email']);
			$designation 				= mysqli_real_escape_string($DBcon,$_POST['designation']);
			$phone 						= mysqli_real_escape_string($DBcon,$_POST['phone']);
			$message					= mysqli_real_escape_string($DBcon,$_POST['message']);
			$status 					= mysqli_real_escape_string($DBcon,$_POST['status']);
			$id 						= mysqli_real_escape_string($DBcon,$_POST['id']);
	
			$query = $DBcon->query("SELECT * FROM testimonial WHERE id = $id");
				
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
					unlink("../images/testimonial/$image");
					/* End */
					
					$myImage = new _image;
					$myImage->uploadTo = '../images/testimonial/'; // SET UPLOAD FOLDER HERE
					$myImage->returnType = 'array'; // RETURN ARRAY OF IMAGE DETAILS
					$img = $myImage->upload($_FILES['file']);
					if($img) {
					$myImage->source_file = $img['path'].$img['image']; // THIS IS AUTOMATICALLY SET BY UPLOAD - just 
					// check the file was create OK and add the image name to the variable: $image
					if(file_exists($img['path'].$img['image'])) {
					$image = $img['image']; }
					} else {
					$image = ''; // or set $image to nothing
					}
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
					$sql = "UPDATE `testimonial` SET `name`='$name',`gender`='$gender',`email`='$email',`phone`='$phone',`image`='$image',`designation`='$designation',`message`='$message',`status`='$status' WHERE id = '$id'";
					
					if ($DBcon->query($sql)) {
						//$_SESSION ['INSERT'] = 1;
						$msg='<div id="success" class="alert alert-success">
									<button data-dismiss="alert" class="close" type="button">×</button>
									<i class="icon-ok-sign"></i><strong>success!</strong> Add successfully  .
								</div>';
						echo "<script language='javascript'>window.location.replace('testimonial.php');</script>";	
					}else {
						$msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
								</div>";
					}
				}
			
	$DBcon->close();
}
if(isset($_POST['testimonial'])) {
	
	$name 						= mysqli_real_escape_string($DBcon,$_POST['name']);
	$gender 					= mysqli_real_escape_string($DBcon,$_POST['gender']);	
	$email 						= mysqli_real_escape_string($DBcon,$_POST['email']);
	$designation 				= mysqli_real_escape_string($DBcon,$_POST['designation']);
	$phone 						= mysqli_real_escape_string($DBcon,$_POST['phone']);
	$message					= mysqli_real_escape_string($DBcon,$_POST['message']);
	$status 					= mysqli_real_escape_string($DBcon,$_POST['status']);
	

	if (empty($_POST['name'])) 
	{
	die('<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="icon-minus-sign"></i><strong>Warning!</strong> name cannot be blank. 
		</div>');
	}
	if (empty($_POST['message'])) 
	{
			die('<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="icon-minus-sign"></i><strong>Warning!</strong> Detail cannot be blank.</div>');
	}
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
					$myImage = new _image;
					$myImage->uploadTo = '../images/testimonial/'; // SET UPLOAD FOLDER HERE
					$myImage->returnType = 'array'; // RETURN ARRAY OF IMAGE DETAILS
					$img = $myImage->upload($_FILES['file']);
					if($img) {
					$myImage->source_file = $img['path'].$img['image']; // THIS IS AUTOMATICALLY SET BY UPLOAD - just 
					// check the file was create OK and add the image name to the variable: $image
					if(file_exists($img['path'].$img['image'])) {
					$image = $img['image']; }
					} else {
					$image = ''; // or set $image to nothing
					}
				}
				 $query = "INSERT INTO `testimonial` SET `name`='$name',`gender`='$gender',`email`='$email',`phone`='$phone',`image`='$image',`designation`='$designation',`message`='$message',`status`='$status',`date`=now()";
				//die();
				if ($DBcon->query($query)) {
					//$_SESSION ['INSERT'] = 1;
					$msg='<div id="success" class="alert alert-success">
								<button data-dismiss="alert" class="close" type="button">×</button>
								<i class="icon-ok-sign"></i><strong>success!</strong> Add successfully  .
							</div>';
					//echo "<script language='javascript'>window.location.replace('testimonial.php');</script>";	
				}else {
					$msg = "<div class='alert alert-danger'>
								<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while Add !
							</div>";
				}
			}
			else{
				$msg = "<div class='alert alert-danger'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp;Invalid file !
						</div>";
			}
				
	$DBcon->close();
}

?>

	<div class="main-wrapper">
		<div class="container-fluid">
		<?php if(isset($_POST['edit'])){ $id = $_POST['edit']; ?>	
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Update Testimonial </h3>
						
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#"> Testimonial </a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Update Testimonial </li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head blue">
							<h3> Update Testimonial </h3>
						</div>
							<?php							 
							if (isset($msg)) {
								echo $msg;
							}
							?>
							<?php  
							if ($delete==1 )
							{ 
							echo '<div id="success" class="alert alert-success">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<i class="icon-ok-sign"></i><strong>success!</strong> Delete successfully  .
							</div>';
							$msg=0;
							}
							$query = $DBcon->query("SELECT * FROM testimonial WHERE id = $id");
							$row=$query->fetch_array();
							$id 					= $row[id];	
							$name 					= $row[name];
							$email 					= $row[email];
							$phone 					= $row[phone];
							$gender 				= $row[gender];
							$designation			= $row[designation];
							$message 				= $row[message];	
							$status 				= $row[status];	
							?>
						<div class="widget-container">
							<div class="form-container grid-form form-background">
								<form class="form-horizontal left-align" id="update-signupForm" method="post" action="" enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label">Name</label>
										<div class="controls">
											<input type="hidden" value="<?php echo $id; ?>" name="id"/>
											<input id="name" name="name" class="span6" type="text" value="<?php echo $name; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Gender</label>
										<div class="controls">
											
											<input type="radio" name="gender" value="male" <?php if($gender =='male'){ echo "checked"; } ?>> Male
											<input type="radio" name="gender" value="female" <?php if($gender =='female'){ echo "checked"; } ?> > Female
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Email</label>
										<div class="controls">
											<input id="location" name="email" value="<?php echo $email ;?>" class="span6" type="Email"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Phone</label>
										<div class="controls">
											<input id="location" name="phone" value="<?php echo $phone ;?>" class="span6" type="text"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Designation</label>
										<div class="controls">
											<input id="location" name="designation" value="<?php echo $designation ;?>" class="span6" type="text"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Message</label>
										<div class="controls">
											<textarea name="message" style="width:50%;height:200px;" required/><?php echo $message; ?>  </textarea>
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
													<img src="../images/testimonial/<?php echo $image; ?>" alt="img" name="file" />
													<?php } ?>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 120px;">
												</div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
													<input type="file" name="file" id="file" />
													</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
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
										<button type="submit" name="update_testimonial" value="update" class="btn btn-primary">Update testimonial</button>
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
						<h3 class="page-header">Add Testimonial </h3>
						
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#"> Testimonial </a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Add Testimonial </li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head blue">
							<h3> Add Testimonial </h3>
						</div>
							<?php							 
							if (isset($msg)) {
								echo $msg;
							}
							?>
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
						<div class="widget-container">
							<div class="form-container grid-form form-background">
								<form class="form-horizontal left-align" id="signupForm" method="post" action="" enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label">Name</label>
										<div class="controls">
											<input id="name" name="name" class="span6" type="text" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Gender</label>
										<div class="controls">
											<input type="radio" name="gender" value="male"> Male
											<input type="radio" name="gender" value="female"> Female
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Email</label>
										<div class="controls">
											<input id="location" name="email" class="span6" type="email"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Phone</label>
										<div class="controls">
											<input id="location" name="phone"  class="span6" type="text"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Designation</label>
										<div class="controls">
											<input id="location" name="designation" class="span6" type="text"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Message</label>
										<div class="controls">
											<textarea name="message" style="width:50%;height:200px;" required/>  </textarea>
										</div>
									</div>	
									<div class="control-group">
										<label class="control-label">Image</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
													<img src="http://www.placehold.it/715x763/EFEFEF/AAAAAA" alt="img" name="file"/>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
												</div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
													<input type="file" name="file" id="file" />
													</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
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
										<button type="submit" name="testimonial" value="add" class="btn btn-primary">Add testimonial</button>
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
						<h3 class="page-header">Testimonial List </h3>
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
											Name
										</th>
										<th>
											Gender
										</th>
										<th>
											Email
										</th>
										<th>
											 IMAGE
										</th>
										<th>
											 Designation
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
								<?php $q = $DBcon->query("select * from testimonial ORDER BY id DESC");
								
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
											<?php echo ucfirst($row1->name); ?>									
										</td>
										<td>							
											<?php  echo $row1->gender; ?>
										</td>
										<td>							
											<?php  echo $row1->email; ?>
										</td>
										<td>							
											<img width="50px;" height="50px;" src="../images/testimonial/<?php  echo $row1->image; ?>"/>
										</td>
										<td>							
											<?php  echo $row1->designation; ?>
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
												<button type="submit" name="edit" value="<?php echo $row1->id; ?>"class="btn btn-info"><i class="icon-user "></i>Edit</button>
											</form>
										</td>
										<td>
											<form method="post" action ="" style="margin: 0px;">
												<button type="submit" id="DELETE" name="DELETE" value="<?php echo $row1->id; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this testimonial ?');"><i class="icon-remove"></i> Delete</button>
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
	