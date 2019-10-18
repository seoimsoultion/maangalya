<?php

session_start();

define("WEBMASTER_EMAIL", 'info@maangalya.co.in');
define("WEBMASTER_EMAIL1", 'info@imsolutions.mobi');
define("WEBMASTER_EMAIL2", 'karthik@imsolutions.mobi');

//define("WEBMASTER_EMAIL1", 'lokesh@imsolutions.mobi'); 
error_reporting(E_ALL ^ E_NOTICE);

function ValidateEmail($value) {
    $regex = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';

    if ($value == '') {
        return false;
    } else {
        $string = preg_replace($regex, '', $value);
    }

    return empty($string) ? true : false;
}

if ($_POST) {


    $name = stripslashes($_POST['name']);
    $email = stripslashes($_POST['email']);
    $ccode = stripslashes($_POST['ccode']);
    $phone = stripslashes($_POST['phone']);
    $query = stripslashes($_POST['message']);
   // $captcha = $_POST['g-recaptcha-response'];
    $subject = 'Enquiry form Durga Projects Home Page';


    $error = '';

// Check fullname
    if (!$name) {
        $error .= 'Please enter your Name.<br />';
        die('<p style="color:red;">Please enter your Name</p>');
    }
    if (!$email) {
        $error .= 'Please enter an e-mail address.<br />';
        die('<p style="color:red;">Please enter an e-mail address</p>');
    }
    if ($email && !ValidateEmail($email)) {
        $error .= 'Please enter a valid e-mail address.<br />';
        die('<p style="color:red;">Please enter a valid e-mail address</p>');
    }
    if (!$ccode) {
        $error .= 'Please Select your Country Code.<br />';
        die('<p style="color:red;">Please Select your Country Code</p>');
    }
    if (!$phone) {
        $error .= 'Please enter your phone.<br />';
        die('<p style="color:red;">Please enter your phone</p>');
    }
    if (!$query) {
        $error .= 'Please enter your message.<br />';
        die('<p style="color:red;">Please enter your message</p>');
    }
    if (!$captcha) {
      //  $error .= 'Please Verify Captcha.<br />';
      //  die('<p style="color:red;">Please Verify Captcha</p>');
    }


    $email_name = "Maangalya";
    $email_to = "noreply@maangalya.co.in";

    $headers = 'MIME-Version: 2.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: ' . $email_name . ' <' . $email_to . '>' . "\r\n";

    $message = '<table cellspacing="0" cellpadding="0" style="width:100%; border-bottom:1px solid #eee; font-size:12px; line-height:135%">
		
		
		<tr align="center">
			<td colspan="3" style="text-align:center;">
				<img src="http://demo.imsolutions.in/maangalya_co/img/new_images/logo.png">
			</td>
        </tr>
		<tr style="background-color:#f5f5f5">
                <th style="vertical-align:top ;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Name <span style="color:red">*</span></th>
                        <td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $name . '</td>
        </tr>
        <tr style="">
                <th style="vertical-align: top;color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Email <span style="color:red">*</span></th>
                        <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">' . $email . '</td>
        </tr>
        <tr style="background-color:#f5f5f5">
                <th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Phone Number <span style="color:red">*</span></th>
                        <td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $phone . '</td>
        </tr>
		<tr>
                <th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Message <span style="color:red">*</span></th>
                        <td style="vertical-align:top;c olor:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $query . '</td>
        </tr>
		
</table>';
    $mail = mail(WEBMASTER_EMAIL, $subject, $message, $headers, '-freturn@maangalya.co.in');
    $mail1 = mail(WEBMASTER_EMAIL1, $subject, $message, $headers, '-freturn@maangalya.co.in');
    $mail2 = mail(WEBMASTER_EMAIL1, $subject, $message, $headers, '-freturn@maangalya.co.in');
    if ($mail || $mail1 || $mail2) {
        $mail = mail($email, 'Thanks for contacting us', '<h4>Thank you for contacting Durga ! Our team will get in touch with you shortly. Appreciate your patience.</h4>', $headers, '-freturn@maangalya.co.in');
        echo 'OK';
    }

    /*
      $response = $_POST['g-recaptcha-response'];
      $url = 'https://www.google.com/recaptcha/api/siteverify';
      $key = '6LernbMUAAAAAFpAboOgiH9-EfYArSbxVy-5Tnwz';
      $data = array('secret' => $key, 'response' => $response);
      $options = array(
      'http' => array(
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => "POST",
      'content' => http_build_query($data),
      ),
      );
      $context = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      if ($result === false) {
      echo 'Failed to contact reCAPTCHA';
      } else {
      $result = json_decode($result);
      if ($result->success) {
      $mail = mail(WEBMASTER_EMAIL,$subject,$message,$headers,'-freturn@maangalya.co.in');
      $mail1 = mail(WEBMASTER_EMAIL1,$subject,$message,$headers,'-freturn@maangalya.co.in');
      $mail2 = mail(WEBMASTER_EMAIL1,$subject,$message,$headers,'-freturn@maangalya.co.in');
      if($mail || $mail1 || $mail2)
      {
      $mail = mail($email,'Thanks for contacting us','<h4>Thank you for contacting Durga ! Our team will get in touch with you shortly. Appreciate your patience.</h4>',$headers,'-freturn@maangalya.co.in');
      echo 'OK';
      }
      } else {
      $error = true;
      echo '<h2 style="color:red !important">You are spammer</h2>';
      }

      }
     */
}
?>