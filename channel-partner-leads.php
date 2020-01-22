<?php


error_reporting(1);
include "my-admin/includes/db.php";


/*if (isset($_POST['register_channel_partner']) && $_POST['register_channel_partner_error'] == 'submit') { */
if (isset($_POST['register_channel_partner'])) { 

	
	
	$result = mysqli_query($con,"SELECT id FROM register_channel_partner order by id desc limit 1");
	$row = mysqli_fetch_object($result);
	//var_dump($row);
	$lastid = $row->id;
	$uniqueid = $lastid+1;
	$uniqueid = 'CP-00'.$uniqueid;
	 $uniqueid;
    $rera_number = mysqli_real_escape_string($DBcon, $_POST['rera_number']);
    $company_name = mysqli_real_escape_string($DBcon, $_POST['company_name']);
    $contact_number = mysqli_real_escape_string($DBcon, $_POST['contact_number']);
    $email = mysqli_real_escape_string($DBcon, $_POST['email']);
    $contact_person_name = mysqli_real_escape_string($DBcon, $_POST['contact_person_name']); 
    $address = mysqli_real_escape_string($DBcon, $_POST['address']);
    if($address=='') {
        $address='n/a';
    }
    $errors = array();
    if (empty($rera_number)) {
         echo  '<p style="color:red">RERA No can not be blank.</p>';
          die();
    }
    if (empty($company_name)) {
         echo  '<p style="color:red">Compnay Name cannot be blank.</p>';
          die();
    }
    if (empty($contact_number)) {
          echo  '<p style="color:red">Contact Number cannot be blank.</p>';
          die();
    }
    if (empty($contact_person_name)) {
        $errors[] = '<p style="color:red">Contact Person Name cannot be blank.</p>';
          die();
    }
    if (empty($email)) {
       echo '<p style="color:red">Email cannot be blank.</p>';
          die();
    }
    if (empty($address)) {
       // $errors[] = 'Please Select Role.';
    }
    if (count($errors) > 0) {
        foreach ($errors as $error1) {
          //  var_dump($error1);
        }
    } else {

        $query1 = "INSERT INTO `register_channel_partner`(`uniqueid`,`rera_number`,`company_name`,`contact_number`,`contact_person_name`, `email`,`address`,`created_date`) VALUES('$uniqueid','$rera_number','$company_name','$contact_number','$contact_person_name','$email','$address',now())";
        $row1 = $DBcon->query($query1);
        $_SESSION ['msg1'] = '<div id="success" class="alert alert-success" style="width:100%;"><button data-dismiss="alert" class="close" type="button">Ã—</button><i class="icon-ok-sign"></i><strong>Your Partner Id send to your e-mail address.</div>';
		
		
		$currentDate = date('Y-m-d H:i:s');
        
/*$input = array (
    'company_name'=> $company_name,
    'rep_id' => 'Maangalya Channel Patners Page',
    'channel_id' => 'Channel Patners Page',
    'subject' =>" New  Registration Form as Channel Partner by " . $contact_person_name,
    'f_name' => $contact_person_name,
    'l_name' => '',
    'email' =>$email,
    'phonefax' => $contact_number,
    'notes' => 'I am Interested in this project.Please call me',
    'project' => 'Channel Patners',
    'alert_client' => 0,
    'alert_rep' => 0);
    */
	
	$input = array (
    'company_name'=> $company_name,
	'contact_num' => $contact_number,
    'email' =>$email,
	'address' =>$address,
	'cr_date'=>$currentDate;
    );
	
	print_r($input);
    die();
    $url = 'https://cloud.paramantra.com/paramantra/index.php/api/channel_partner/createChannelPartner/format/json';
    $api_key='NNFLBAqH5rztFK2uFooyupyKNK';
    $app_name='ANG5v';
     
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: $api_key ","ACTION-ON: $app_name"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_USERPWD, $api_key );
        $data_resp = curl_exec($ch);
        curl_close($ch);
var_dump($data_resp);
die();
        if ($row1) {

            $to = 'hamalton@imsolutions.mobi'; 
			$to1 = 'hamalton.xavier@gmail.com'; 
            //$to1 = 'jitesh@maangalyaprojects.com'; 
           // $to2 = 'cp@maangalyaprojects.com'; 
            $subject = "Successfully Registered as a Channel Partner.";
            $subject_1 = "New  Registration Form as Channel Partner by " . $contact_person_name;
            $from = 'noreply@maangalya.co.in';
            $body = 'New  Registration Form as Channel Partner.<br/> Partner ID is : ' . $uniqueid . '
                <br/><br/>
			<table cellspacing="0" cellpadding="0" style="width:100%; border-bottom:1px solid #eee; font-size:12px; line-height:135%">	
			
			<tr align="center">
				<td colspan="3" style="text-align:center;">
					<img src="http://demo.imsolutions.in/maangalya_co/img/new_images/logo.png">
				</td>
			</tr>
			<tr style="background-color:#f5f5f5">
					<th style="vertical-align:top ;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Unique ID <span style="color:red">*</span></th>
							<td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $uniqueid . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top ;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Rera Number <span style="color:red">*</span></th>
							<td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $rera_number . '</td>
			</tr>
			<tr style="background-color:#f5f5f5">
					<th style="vertical-align: top;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Email <span style="color:red">*</span></th>
							<td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">' . $email . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Phone Number <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $contact_number . '</td>
			</tr>
			<tr style="background-color:#f5f5f5">
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Company Name <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $company_name . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Address <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $address . '</td>
			</tr>
			</table>';
				$message = '
				   Your Registration as a Channel Partner has been registered Successfully.<br/>
					<table cellspacing="0" cellpadding="0" style="width:100%; border-bottom:1px solid #eee; font-size:12px; line-height:135%">
			
			
			<tr align="center">
				<td colspan="3" style="text-align:center;">
					<img src="http://demo.imsolutions.in/maangalya_co/img/new_images/logo.png">
				</td>
			</tr>
			<tr style="background-color:#f5f5f5">
					<th style="vertical-align:top ;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Your Unique ID<span style="color:red">*</span></th>
							<td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $uniqueid . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top ;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Rera Number <span style="color:red">*</span></th>
							<td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $rera_number . '</td>
			</tr>
			<tr  style="background-color:#f5f5f5">
					<th style="vertical-align: top;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Email <span style="color:red">*</span></th>
							<td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">' . $email . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Phone Number <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $contact_number . '</td>
			</tr>
			<tr  style="background-color:#f5f5f5">
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Company Name <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $company_name . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Address <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $address . '</td>
			</tr>
			
			</table>';
            // $body1 = 'Your Registration as a Channel Partner has been registered Successfully.<br/> Your partner ID is : ' . $rera_number;
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";									$response = $_POST['g-recaptcha-response'];			$url = 'https://www.google.com/recaptcha/api/siteverify';			$key = '6Ld9Wb4UAAAAAAf2XQAZVasm1sLPL2MKDuVaCK4E';			$data = array('secret' => $key, 'response' => $response);			$options = array(			'http' => array(			'header' => "Content-type: application/x-www-form-urlencoded\r\n",			'method' => "POST",			'content' => http_build_query($data),			),			);			$context = stream_context_create($options);			$result = file_get_contents($url, false, $context);			if ($result === false) {			echo 'Failed to contact reCAPTCHA';			} else {				$result = json_decode($result);				if ($result->success) {
					mail($to, $subject, $message, $headers, '-freturn@maangalya.co.in');
					mail($to1, $subject_1, $body, $headers, '-freturn@maangalya.co.in');
					//mail($to2, $subject_1, $body, $headers, '-freturn@maangalya.co.in');
					echo 'OK';											} else {					$error = true;					echo '<h2 style="color:red !important">You are spammer</h2>';				}			}
            // die();
            // header("Location: cp.php");
			
        }
        // echo "<script language='javascript'>window.location.replace('cp.php');</script>";
    }
}

if (isset($_POST['lead']) ) { /* echo "<pre>";
  var_dump($_POST); */
    $to = mysqli_real_escape_string($DBcon, trim($_REQUEST['partner_id']));
    $partner_id = mysqli_real_escape_string($DBcon, $_POST['partner_id']);
    $customer_contact_number = mysqli_real_escape_string($DBcon, $_POST['customer_contact_number']);
    $customer_name = mysqli_real_escape_string($DBcon, $_POST['customer_name']);
    $customer_email = mysqli_real_escape_string($DBcon, $_POST['customer_email']);
    $project = mysqli_real_escape_string($DBcon, $_POST['project']);
    $notes = mysqli_real_escape_string($DBcon, $_POST['notes']);
    if($notes=='') {
        $notes='n/a';
    }
    $errors = array();
    if (empty($partner_id)) {
        echo  '<p style="color:red">Partner id cannot be blank.</p>';
        die();
    }
    if (empty($customer_contact_number)) {
        echo  '<p style="color:red">Contact cannot be blank.</p>';
          die();
    }
    if (empty($customer_name)) {
        echo  '<p style="color:red">Name cannot be blank.</p>';
          die();
    }
    if (empty($customer_email)) {
         echo '<p style="color:red">Email cannot be blank.</p>';
          die();
    }
    if (empty($project)) {
         echo '<p style="color:red">Project Name cannot be blank.</p>';
          die();
    }
    if (empty($notes)) {
       // $errors[] = 'Please Select Role.';
    }
    /////////////////////
    //
     $ccs1="select uniqueid from register_channel_partner where uniqueid='$partner_id'";
    
    $q1=$DBcon->query($ccs1); 
    $res1=$q1->num_rows;
    if($res1==0) {
            echo '<p style="color:red">Your ID is wrong.</p>';
            die();
    }
    //////////////checking lead exit or not///////////////////////
     $ccs="select partner_id, customer_email, customer_contact_number from lead where partner_id='$partner_id' AND customer_email='$customer_email' AND customer_contact_number='$customer_contact_number'";
    $q=$DBcon->query($ccs);
    $res=$q->num_rows;
    if($res>0) {
            echo '<p style="color:red">Lead Already exist.</p>';
            die();
    }
    if (count($errors) > 0) {
        foreach ($errors as $error) {
          // var_dump($error);
        }
    } else {
        if ($to != '') {
            $query1 = "INSERT INTO `lead`(`partner_id`,`customer_contact_number`,`customer_name`,`customer_email`,`project`,`notes`,`created_date`) VALUES('$partner_id','$customer_contact_number','$customer_name','$customer_email','$project','$notes',now())";
            $row1 = $DBcon->query($query1);
            $_SESSION ['msg'] = '<div id="success" class="alert alert-success" style="width:100%;"><button data-dismiss="alert" class="close" type="button">Ã—</button><i class="icon-ok-sign"></i><strong>Your Lead Submit successfully.</div>';
        }
        if ($row1) {

            $to = 'info@imsolutions.mobi'; 
            $to1 = 'jitesh@maangalyaprojects.com'; 
            $to2 = 'cp@maangalyaprojects.com'; 
            $subject = " New Lead has been Registered Successfully";
            $subject_1 = "Lead Mail for Channel Partner by " . $partner_id;
            $from = 'noreply@maangalya.co.in';
            $body = 'Thank you, New Lead has been Registered Successfully. <br/><br/>Details are below <br/>
			<table cellspacing="0" cellpadding="0" style="width:100%; border-bottom:1px solid #eee; font-size:12px; line-height:135%">		
		
			<tr align="center">
				<td colspan="3" style="text-align:center;">
					<img src="http://demo.imsolutions.in/maangalya_co/img/new_images/logo.png">
				</td>
			</tr>
			<tr style="background-color:#f5f5f5">
					<th style="vertical-align:top ;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Customer Contact Number <span style="color:red">*</span></th>
							<td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $customer_contact_number . '</td>
			</tr>
			<tr style="">
					<th style="vertical-align: top;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Customer Name <span style="color:red">*</span></th>
							<td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">' . $customer_name . '</td>
			</tr>
			<tr style="background-color:#f5f5f5">
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Customer Email <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $customer_email . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Project <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $project . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Notes <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $notes . '</td>
			</tr>
			
			</table>';
				$body1 = ' New Lead From Partner Id :' . $partner_id . ' on ' . date('d-m-Y') . '<br/><br/><table cellspacing="0" cellpadding="0" style="width:100%; border-bottom:1px solid #eee; font-size:12px; line-height:135%">
			
			
			<tr align="center">
				<td colspan="3" style="text-align:center;">
					<img src="http://demo.imsolutions.in/maangalya_co/img/new_images/logo.png">
				</td>
			</tr>
			<tr style="background-color:#f5f5f5">
					<th style="vertical-align:top ;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Customer Contact Number <span style="color:red">*</span></th>
							<td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $customer_contact_number . '</td>
			</tr>

			<tr style="">
					<th style="vertical-align: top;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Customer Name <span style="color:red">*</span></th>
							<td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">' . $customer_name . '</td>
			</tr>
			<tr style="background-color:#f5f5f5">
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Customer Email <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $customer_email . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Project <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $project . '</td>
			</tr>
			<tr>
					<th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Notes <span style="color:red">*</span></th>
							<td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $notes . '</td>
			</tr>
			
			</table>';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            if ($to != '') {								$response = $_POST['g-recaptcha-response'];				$url = 'https://www.google.com/recaptcha/api/siteverify';				$key = '6Ld9Wb4UAAAAAAf2XQAZVasm1sLPL2MKDuVaCK4E';				$data = array('secret' => $key, 'response' => $response);				$options = array(				'http' => array(				'header' => "Content-type: application/x-www-form-urlencoded\r\n",				'method' => "POST",				'content' => http_build_query($data),				),				);				$context = stream_context_create($options);				$result = file_get_contents($url, false, $context);				if ($result === false) {					echo 'Failed to contact reCAPTCHA';				}else {					$result = json_decode($result);					if ($result->success) {	
							mail($to, $subject, $body, $headers, '-freturn@maangalya.co.in');
							mail($to1, $subject_1, $body1, $headers, '-freturn@maangalya.co.in');
							mail($to2, $subject_1, $body1, $headers, '-freturn@maangalya.co.in');
							echo 'OK';						} else {						$error = true;						echo '<h2 style="color:red !important">You are spammer</h2>';						}					}	
            }
          
        }
//   echo "<script language='javascript'>window.location.replace('cp.php');</script>";
    }
}