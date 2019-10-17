<?php
 session_start();
 if (!empty($_SESSION['admin']))
 { ?>
<?php include "includes/header.php"; ?>

<script type="text/javascript">
	$(function () {                
		$("#change_password").validate({
			rules: {
				old_password : "required",
				folder_date: "required",
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				}
			},
			messages: {
				old_password 	: "Please enter your Old Password",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
		});
	});            
</script>

<?php include "includes/upper_navi.php"; ?>
<?php include "includes/left_navi.php"; ?>
	<div class="main-wrapper">
		<div class="container-fluid">
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Change Password</h3>						
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#">Profile</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Change Password</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
				<div id="message"></div>
					<div class="content-widgets gray">
						<div class="widget-head blue">						
							<h3> Change Password</h3>
						</div>
						<div class="widget-container">
							<div class="form-container grid-form form-background">
								<form class="form-horizontal left-align" id="change_password" >
									<div class="control-group">
										<label class="control-label">Old Password</label>
										<div class="controls">
											<input id="old_password" name="old_password" class="span12" type="text" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">New Password</label>
										<div class="controls">
											<input id="password" name="password" class="span12" type="text" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Conform Password</label>
										<div class="controls">
											<input id="confirm_password" name="confirm_password" class="span12" type="text" />
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" name="folder" value="add" class="btn btn-primary">Change Password</button>
										<button type="reset" class="btn">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<script type="text/javascript">                                 
		// contact form js
		jQuery(document).ready(function($) {
		$("#change_password").submit(function() {
		var str = $(this).serialize();
		$.ajax({
		  type: "POST",
		  url: "change_password_process.php",
		  data: str,
		  success: function(msg) {
		  // Message Sent? Show the 'Thank You' message and hide the form
		  if(msg == 'OK') {
			  result = ' <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-minus-sign"></i><strong> Ok !</strong> Now Password is successfully changed</div> ';
			  $('.change_password').val('');
			  setTimeout("location.reload(true);",3000);
		  } else {
			  result = msg;
		  }
		  $('#message').html(result);
		}
		});
		return false;
		});
		});
   </script>  
	<?php include "includes/footer.php"; 
	}else
	{
	header("Location: login.php");
	}
	?>