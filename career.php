<?php
 // var_dump($_POST);
if ($_POST) {
   $mm='';
    $to = "lokesh@imsolutions.mobi";
    $to1 = "hamalton@imsolutions.mobi"; 



    $name = stripslashes($_POST['name']);
    $from = $_POST['email'];
    $city = $_POST['city'];
    $phone = stripslashes($_POST['mobile']);
    $post = $_POST['post'];
    $experience = $_POST['experience'];
    $fileatt = $_POST['files'];
    $msg = $_POST['msg'];
    $subject = "Enquiry From Career Page from Maangalya Career Page";


    /*
      $ip=$_SERVER['REMOTE_ADDR'];
      $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
      //var_dump($details);
      $details->region.'<br/>';
      $details->city.'<br/>';
     */
//print_r ($_SERVER['REMOTE_ADDR']);


    $message = '<table cellspacing="0" cellpadding="0" style="width:100%; border-bottom:1px solid #eee; font-size:12px; line-height:135%">

		<tr style="background-color:#f5f5f5">
                <th style="vertical-align:top ;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Name <span style="color:red">*</span></th>
                        <td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $name . '</td>
        </tr>
        <tr style="">
                <th style="vertical-align: top;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Email <span style="color:red">*</span></th>
                        <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">' . $from . '</td>
        </tr>
		<tr style="background-color:#f5f5f5">
                <th style="vertical-align: top;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">City <span style="color:red">*</span></th>
                        <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">' . $city . '</td>
        </tr>
        
        <tr>
                <th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Phone Number <span style="color:red">*</span></th>
                        <td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $phone . '</td>
        </tr>
        <tr style="background-color:#f5f5f5">
                <th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Post <span style="color:red">*</span></th>
                        <td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $post . '</td>
        </tr>
		<tr style="">
                <th style="vertical-align: top;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Experience <span style="color:red">*</span></th>
                        <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">' . $experience . '</td>
        </tr>
        
		
		<tr style="background-color:#f5f5f5">
                <th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Message <span style="color:red">*</span></th>
                        <td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $msg . '</td>
        </tr>
</table>';


// Obtain file upload vars
    $fileatt = $_FILES['files']['tmp_name'];
    $fileatt_type = $_FILES['files']['type'];
    $fileatt_name = $_FILES['files']['name'];
    $aa = filesize($fileatt);


    if (is_uploaded_file($fileatt)) {
        // Read the file to be attached ('rb' = read binary)
        $file = fopen($fileatt, 'rb');
        $data = fread($file, filesize($fileatt));
        fclose($file);
        $fromto = 'noreply@demo.imsolutions.in';
        $co = "Maangalya";
        // Generate a boundary string
                      $headers = "From:  $co  <$fromto> ";
                // Generate a boundary string
                $semi_rand = md5(time());
                $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
        
                // Add the headers for a file attachment
                $headers .= "\nMIME-Version: 1.0\n" .
                        "Content-Type: multipart/mixed;\n" .
                        " boundary=\"{$mime_boundary}\"";


        // Add a multipart boundary above the plain message
        $message = "This is a multi-part message in MIME format.\n\n" .
                "--{$mime_boundary}\n" .
                "Content-Type: text/html; charset=\"iso-8859-1\"\n" .
                "Content-Transfer-Encoding: 7bit\n\n" .
                $message . "\n\n";

        // Base64 encode the file data
        $data = chunk_split(base64_encode($data));

        // Add file attachment to the message
        $message .= "--{$mime_boundary}\n" .
                "Content-Type: {$fileatt_type};\n" .
                " name=\"{$fileatt_name}\"\n" .
                //"Content-Disposition: attachment;\n" .
                //" filename=\"{$fileatt_name}\"\n" .
                "Content-Transfer-Encoding: base64\n\n" .
                $data . "\n\n" .
                "--{$mime_boundary}--\n";
        // Send the message
        if (!empty($name) && !empty($from) && !empty($city) && !empty($phone) && !empty($post) && !empty($experience) && !empty($msg) && ($fileatt_type == "application/msword" || $fileatt_type=="application/octet-stream" || $fileatt_type == "application/pdf" || $fileatt_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )) {
            $ok = @mail($to, $subject, $message, $headers, '-freturn@imsolutions.co');
            $ok = @mail($to1, $subject, $message, $headers, '-freturn@imsolutions.co');
            $mm = '<p>	<strong>Mail  send</strong> Successfully.</p>';
             
        } else {
            $mm = '<p>	<strong>Mail not send!</strong> Please fill all details.</p>';
        
        }
    }
}
?>


<!DOCTYPE html>
<html> 
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Career Maangalya</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">



		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<?php include('include/header.php')?>
        <?php include('include/header.php') ?>
        <style>
          
        </style>
    <div role="main" class="main">

      <section class="section section-tertiary section-no-border pb-3 mt-0">
					<div class="container">
						<div class="row justify-content-end mt-4">
							<div class="col-lg-10 pt-4 mt-4 text-right">
								<h1 class="text-uppercase font-weight-light mt-4 pt-3 text-color-primary">Career</h1>
							</div>
						</div>
					</div>
				</section>
        <hr class="m-0">

        <div class="container py-5 mt-3">

            <div class="row">
                <div class="col-lg-8">
                    <div class="overflow-hidden mb-2">
                        <h2 class="font-weight-normal text-7 mb-2 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">Find Your <strong class="font-weight-extra-bold">Oportunity</strong></h2>
                    </div>
                    <div class="overflow-hidden mb-4">
                        <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc euismod facilisis neque, eu malesuada diam finibus non.</p>
                    </div>
                    <p class="text-color-light-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget. Suspendisse potenti. Curabitur euismod facilisis neque, eu malesuada diam finibus non. Nullam nec vehicula leo. Morbi porta ante eu feugiat mollis.</p>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial testimonial-primary appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
                        <blockquote>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Curabitur euismod facilisis neque, eu malesuada diam.</p>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>

        <section class="section section-default border-0 m-0">
            <div class="container py-4">

                <div class="row pb-4">
                    <div class="col-md-6">
                        <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
                            <h4 class="mt-2 mb-2">Current <strong>Openings</strong></h4>

                            <div class="accordion accordion-modern accordion-modern-grey-scale-1 without-bg mt-4" id="accordion11">
                                <div class="card card-default mb-2">
                                    <div class="card-header">
                                        <h4 class="card-title m-0">
                                            <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11One">
                                                Senior Software Developer - Web Development
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse11One" class="collapse show">
                                        <div class="card-body mt-3">
                                            <p>Suspendisse potenti. Curabitur euismod facilisis neque, eu malesuada diam finibus non. Nullam nec vehicula leo. Morbi porta ante eu feugiat mollis ellus blandit massa enim. Nullam id varius nunc ellus blandit massa enim. Nullam id varius nunc.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget.</p>

                                            <ul class="list list-inline mt-4 mb-3 text-2">
                                                <li class="list-inline-item">
                                                    <strong>LOCATION:</strong>
                                                    NEW YORK
                                                </li>
                                                <li class="list-inline-item ml-md-3">
                                                    <strong>QUALIFICATION:</strong>
                                                    3+ YEARS EXPERIENCE, GRADUATION
                                                </li>
                                            </ul>

                                            <a href="#" class="btn btn-modern btn-dark">Apply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-default mb-2">
                                    <div class="card-header">
                                        <h4 class="card-title m-0">
                                            <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Two">
                                                Infrastructure Monitoring - Software Developer
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse11Two" class="collapse">
                                        <div class="card-body mt-3">
                                            <p>Suspendisse potenti. Curabitur euismod facilisis neque, eu malesuada diam finibus non. Nullam nec vehicula leo. Morbi porta ante eu feugiat mollis ellus blandit massa enim. Nullam id varius nunc ellus blandit massa enim. Nullam id varius nunc.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget.</p>

                                            <ul class="list list-inline mt-4 mb-3 text-2">
                                                <li class="list-inline-item">
                                                    <strong>LOCATION:</strong>
                                                    NEW YORK
                                                </li>
                                                <li class="list-inline-item ml-md-3">
                                                    <strong>QUALIFICATION:</strong>
                                                    3+ YEARS EXPERIENCE, GRADUATION
                                                </li>
                                            </ul>

                                            <a href="#" class="btn btn-modern btn-dark">Apply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-default mb-2">
                                    <div class="card-header">
                                        <h4 class="card-title m-0">
                                            <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Three">
                                                Main Developer - Software Developer
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse11Three" class="collapse">
                                        <div class="card-body mt-3">
                                            <p>Suspendisse potenti. Curabitur euismod facilisis neque, eu malesuada diam finibus non. Nullam nec vehicula leo. Morbi porta ante eu feugiat mollis ellus blandit massa enim. Nullam id varius nunc ellus blandit massa enim. Nullam id varius nunc.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget.</p>

                                            <ul class="list list-inline mt-4 mb-3 text-2">
                                                <li class="list-inline-item">
                                                    <strong>LOCATION:</strong>
                                                    NEW YORK
                                                </li>
                                                <li class="list-inline-item ml-md-3">
                                                    <strong>QUALIFICATION:</strong>
                                                    3+ YEARS EXPERIENCE, GRADUATION
                                                </li>
                                            </ul>

                                            <a href="#" class="btn btn-modern btn-dark">Apply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-default mb-2">
                                    <div class="card-header">
                                        <h4 class="card-title m-0">
                                            <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Four">
                                                Front-End Developer - Software Developer
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse11Four" class="collapse">
                                        <div class="card-body mt-3">
                                            <p>Suspendisse potenti. Curabitur euismod facilisis neque, eu malesuada diam finibus non. Nullam nec vehicula leo. Morbi porta ante eu feugiat mollis ellus blandit massa enim. Nullam id varius nunc ellus blandit massa enim. Nullam id varius nunc.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget.</p>

                                            <ul class="list list-inline mt-4 mb-3 text-2">
                                                <li class="list-inline-item">
                                                    <strong>LOCATION:</strong>
                                                    NEW YORK
                                                </li>
                                                <li class="list-inline-item ml-md-3">
                                                    <strong>QUALIFICATION:</strong>
                                                    3+ YEARS EXPERIENCE, GRADUATION
                                                </li>
                                            </ul>

                                            <a href="#" class="btn btn-modern btn-dark">Apply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-default mb-2">
                                    <div class="card-header">
                                        <h4 class="card-title m-0">
                                            <a class="accordion-toggle text-3" data-toggle="collapse" data-parent="#accordion11" href="#collapse11Five">
                                                Lead Designer - Design
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse11Five" class="collapse">
                                        <div class="card-body mt-3">
                                            <p>Suspendisse potenti. Curabitur euismod facilisis neque, eu malesuada diam finibus non. Nullam nec vehicula leo. Morbi porta ante eu feugiat mollis ellus blandit massa enim. Nullam id varius nunc ellus blandit massa enim. Nullam id varius nunc.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget.</p>

                                            <ul class="list list-inline mt-4 mb-3 text-2">
                                                <li class="list-inline-item">
                                                    <strong>LOCATION:</strong>
                                                    NEW YORK
                                                </li>
                                                <li class="list-inline-item ml-md-3">
                                                    <strong>QUALIFICATION:</strong>
                                                    3+ YEARS EXPERIENCE, GRADUATION
                                                </li>
                                            </ul>

                                            <a href="#" class="btn btn-modern btn-dark">Apply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="400">
                           <?php /*
                            <div class="owl-carousel owl-theme dots-inside mb-0 pb-0" data-plugin-options="{'items': 1, 'autoplay': true, 'autoplayTimeout': 4000, 'margin': 10, 'animateOut': 'fadeOut', 'dots': false}">
                                <div class="pb-5">
                                    <img alt="" class="img-fluid rounded box-shadow-3" src="img/generic/generic-corporate-3-2-full.jpg">
                                </div>
                                <div class="pb-5">
                                    <img alt="" class="img-fluid rounded box-shadow-3" src="img/generic/generic-corporate-3-3-full.jpg">
                                </div>
                            </div> */ ?>
                            <div>
                                <h3 style="color: white;border-bottom: 1px dotted #ccc;background: #E04622;padding:12px;text-align: center">APPLY FOR YOUR JOB </h3>
                                <form id="career" role="form" method="post" action="">
                                    <div id="carnote"><?php echo $mm; ?></div>
                                    <input type="hidden" name="lead" value="lead">
                                    <div class="form-group row">
                                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Name</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" required type="text" name="name"  placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">
                                            Email Id </label>
                                        <div class="col-lg-8">
                                            <input class="form-control" required type="text" name="email"  placeholder="Email Id ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">City </label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" placeholder="City " name="city" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Phone No </label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" placeholder="Phone No " name="mobile" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2 required">Apply for </label>
                                        <div class="col-lg-8">

                                            <select id="user_time_zone" name="post" class="form-control" size="0" required>
                                                <option value="">Select any one *</option><option value="Sr. Sales Manager">Sr. Sales Manager</option>
                                                <option value=" Project Manager"> Project Manager</option>

                                                <option value="Pre Sales Executive">Pre Sales Executive</option>
                                                <option value="Junior Accountant">Sr.Manager Legal</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2">Experience</label>
                                        <div class="col-lg-8">
                                            <select id="user_time_zone" name="experience" class="form-control" size="0" required>
                                                <option value="">Select any one</option>
                                                <option value="5 years +">5 years +</option>
                                                <option value="2-5 years">2-5 years</option>
                                                <option value="1 year or less">1 year or less</option>

                                            </select>
                                        </div>
                                    </div>
                                    
                                      <div class="form-group row">
                                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2">Message</label>
                                        <div class="col-lg-8">
                                            <input type="file" name="files">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 font-weight-bold text-dark col-form-label form-control-label text-2">Message</label>
                                        <div class="col-lg-8">
                                            <textarea rows="2" name="msg" class="form-control"></textarea>
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <div class="form-group col-lg-8">

                                        </div>
                                        <div class="form-group col-lg-4">
                                            <input type="submit" value="Save" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>

                            </div>

<?php /*
                            <div class="toggle toggle-primary toggle-simple" data-plugin-toggle>
                                <section class="toggle active">
                                    <label>Our Benefits</label>
                                    <div class="toggle-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet.</p>
                                    </div>
                                </section>
                                <section class="toggle">
                                    <label>Our Culture</label>
                                    <div class="toggle-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla, orci sit amet posuere auctor.</p>
                                    </div>
                                </section>
                                <section class="toggle">
                                    <label>Join Our Team</label>
                                    <div class="toggle-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla, orci sit amet posuere auctor, orci eros pellentesque odio, nec pellentesque erat ligula nec massa. Aenean consequat lorem ut felis ullamcorper posuere gravida tellus faucibus. Maecenas dolor elit, pulvinar eu vehicula eu, consequat et lacus. Duis et purus ipsum. In auctor mattis ipsum id molestie. Donec risus nulla, fringilla a rhoncus vitae, semper a massa. Vivamus ullamcorper, enim sit amet consequat laoreet, tortor tortor dictum urna, ut egestas urna ipsum nec libero. Nulla justo leo, molestie vel tempor nec, egestas at massa. Aenean pulvinar, felis porttitor iaculis pulvinar, odio orci sodales odio, ac pulvinar felis quam sit.</p>
                                    </div>
                                </section>
                            </div>
                           */ ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>

    <?php include('include/footer.php') ?>