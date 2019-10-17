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
				tittle : "required",
				location : "required",
				event_date : "required",
				event_start_time : "required",
				event_end_time : "required",
				file: "required",
				status: "required",
				detail: {
                required: true,
                minlength: 5,
                maxlength: 30,
                lettersonly: true
				},
			},
			messages: {
				tittle 	: "Tittle cannot be blank",
				location : "Location cannot be blank",
				event_date : "Blog date cannot be blank",
				event_start_time : "Blog start time cannot be blank",
				event_end_time : "Blog end time cannot be blank",
				file:"Please Select Image",
				status:"Please Select Status",
				detail: {
                required: "Enter your message 3-20 characters"
				}
			}
		});
	});
	$(function () {                
		$("#update-signupForm").validate({
			rules: {
				tittle : "required",
				status: "required",
				detail: {
                required: true,
                minlength: 5,
                maxlength: 30,
                lettersonly: true
				},
			},
			messages: {
				tittle 	: "Tittle cannot be blank",
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
		
		$query = $DBcon->query("SELECT * FROM blog WHERE id = $id");
			
		$row=$query->fetch_array();
			
		$image = $row[causes_image];
		
		unlink("../images/blog/$image");
		
		$q = $DBcon->query("DELETE  FROM `blog` where id ='".$id."'");
		
		$DBcon->query($q);
		
		if($q){		
			$delete=1;		
		}
	}

if(isset($_POST['update_event'])) {
			/*echo "<pre>";		
			var_dump($_POST);
			var_dump($_FILES);
			die();*/
			$tittle 			= mysqli_real_escape_string($DBcon,$_POST['tittle']);
			$blog_cat 			= mysqli_real_escape_string($DBcon,$_POST['blog_cat']);
			$detail 			= mysqli_real_escape_string($DBcon,$_POST['detail']);	
			$status 			= mysqli_real_escape_string($DBcon,$_POST['status']);
			$blog_date 			= mysqli_real_escape_string($DBcon,$_POST['blog_date']);
			$id 				= mysqli_real_escape_string($DBcon,$_POST['id']);
	
			$query = $DBcon->query("SELECT * FROM blog WHERE id = $id");
				
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
					unlink("../images/blog/$image");
					/* End */
					
					$myImage = new _image;
					$myImage->uploadTo = '../images/blog/'; // SET UPLOAD FOLDER HERE
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
					 $sql = 'UPDATE blog SET blog_name="'.$tittle .'",blog_cat="'.$blog_cat .'",blog_detail="'.$detail .'",image="'.$image .'",status="'.$status .'",date="'.$blog_date .'"  WHERE id = "'.$id .'" ';
					
					if ($DBcon->query($sql)) {
						//$_SESSION ['INSERT'] = 1;
						$msg='<div id="success" class="alert alert-success">
									<button data-dismiss="alert" class="close" type="button">×</button>
									<i class="icon-ok-sign"></i><strong>success!</strong> Add successfully  .
								</div>';
						echo "<script language='javascript'>window.location.replace('blog.php');</script>";	
					}else {
						$msg = "<div class='alert alert-danger'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
								</div>";
					}
				}
			
	$DBcon->close();
}
if(isset($_POST['blog'])) {
	
	$tittle 			= mysqli_real_escape_string($DBcon,$_POST['tittle']);
	$blog_cat 			= mysqli_real_escape_string($DBcon,$_POST['blog_cat']);
	$detail 			= mysqli_real_escape_string($DBcon,$_POST['detail']);	
	$status 			= mysqli_real_escape_string($DBcon,$_POST['status']);
	$blog_date 			= mysqli_real_escape_string($DBcon,$_POST['blog_date']);
	

	if (empty($_POST['tittle'])) 
	{
	die('<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="icon-minus-sign"></i><strong>Warning!</strong> Tittle cannot be blank. 
		</div>');
	}
	if (empty($_POST['detail'])) 
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
					$myImage->uploadTo = '../images/blog/'; // SET UPLOAD FOLDER HERE
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
				$query = "INSERT INTO blog(blog_name,blog_cat,blog_detail,image,date,status) VALUES('$tittle','$blog_cat','$detail','$image','$blog_date','$status')";
				if ($DBcon->query($query)) {
					//$_SESSION ['INSERT'] = 1;
					$msg='<div id="success" class="alert alert-success">
								<button data-dismiss="alert" class="close" type="button">×</button>
								<i class="icon-ok-sign"></i><strong>success!</strong> Add successfully  .
							</div>';
					//echo "<script language='javascript'>window.location.replace('blog.php');</script>";	
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
						<h3 class="page-header">Update Blog </h3>
						
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#"> Blog </a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Update Blog </li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head blue">
							<h3> Update Blog </h3>
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
							$query = $DBcon->query("SELECT * FROM blog WHERE id = $id");
							$row=$query->fetch_array();
							$id 				= $row[id];	
							$tittle 			= $row[blog_name];	
							$detail 			= $row[blog_detail];	
							$image 				= $row[image];	
							$status 			= $row[status];	
							$blog_date 			= $row['date'];	
							
							?>
						<div class="widget-container">
							<div class="form-container grid-form form-background">
								<form class="form-horizontal left-align" id="update-signupForm" method="post" action="" enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label">Blog Tittle</label>
										<div class="controls">
											<input type="hidden" value="<?php echo $id; ?>" name="id"/>
											<input id="name" name="tittle" class="span6" type="text" value="<?php echo $tittle; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Blog Category</label>
										<div class="controls">
											<select name="blog_cat" class="span6">
												<option> Select Blog Category</option>
												<?php 
												$qr = $DBcon->query("select * from blog_category"); 
												while($row1 =MySQLi_fetch_object($qr)){   ?>
												<option value='<?php echo $row1->blog_cat; ?>'><?php echo $row1->blog_cat_name; ?></option>
												<?php }	?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Blog Date </label>
										<div class="controls">										
											<div id="datetimepicker4" class="input-append">
												<input data-format="yyyy-MM-dd" name="blog_date" value="<?php echo $blog_date ;?>" type="text"><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Detail</label>
										<div class="controls">
											<textarea name="detail" id="detail" style="width:100%;height:400px;visibility:hidden;" required/><?php echo $detail; ?>  </textarea>
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
													<img src="../images/blog/<?php echo $image; ?>" alt="img" name="file" />
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
										<button type="submit" name="update_event" value="update" class="btn btn-primary">Update Blog</button>
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
						<h3 class="page-header">Add Blog </h3>
						
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#"> Blog </a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Add Blog </li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head blue">
							<h3> Add Blog </h3>
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
										<label class="control-label">Blog Tittle</label>
										<div class="controls">
											<input id="name" name="tittle" class="span6" type="text"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Blog Category</label>
										<div class="controls">
											<select name="blog_cat" class="span6">
												<option> Select Blog Category</option>
												<?php 
												$qr = $DBcon->query("select * from blog_category"); 
												while($row1 =MySQLi_fetch_object($qr)){   ?>
												<option value='<?php echo $row1->blog_cat; ?>'><?php echo $row1->blog_cat_name; ?></option>
												<?php }	?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Blog Date </label>
										<div class="controls">										
											<div id="datetimepicker4" class="input-append">
												<input data-format="yyyy-MM-dd" name="blog_date" type="text"><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Detail</label>
										<div class="controls">
											<textarea name="detail" id="detail" style="width:100%;height:400px;visibility:hidden;" required/>  </textarea>
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
										<button type="submit" name="blog" value="add" class="btn btn-primary">Add Blog</button>
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
						<h3 class="page-header">Blog List </h3>
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
											Blog Name
										</th>
										<th>
											 IMAGE
										</th>
										<th>
											 Blog Cat.
										</th>
										<th>
											 Date
										</th>															
										<th>
											 Detail
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
								<?php $q = $DBcon->query("select * from blog ORDER BY id DESC");
								
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
											<?php echo ucfirst($row1->blog_name); ?>									
										</td>
										<td>							
											<img width="50px;" height="50px;" src="../images/blog/<?php  echo $row1->image; ?>"/>
										</td>
										<td>							
											<?php  echo $row1->blog_cat; ?>
										</td>
										<td>							
											<?php  echo $row1->date; ?>
										</td>								
										<td>							
											<?php $blog_detail = substr($row1->blog_detail,0,10).'...'; if ($row1->blog_detail){   echo $blog_detail; } else { ?> NA  <?php } ?>
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
												<button type="submit" id="DELETE" name="DELETE" value="<?php echo $row1->id; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Blog ?');"><i class="icon-remove"></i> Delete</button>
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
	