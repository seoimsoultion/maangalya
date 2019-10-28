<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
error_reporting(1);
$servername = "localhost";
$username = "evita";
$password = "evita@123";
$dbname = "evita";

//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
}


define("WEBMASTER_EMAIL", 'karthik@imsolutions.mobi');
//define("WEBMASTER_EMAIL1", 'bikram@imsolutions.mobi');
define("WEBMASTER_EMAIL2", 'jitesh85@gmail.com');
define("WEBMASTER_EMAIL3", 'info@imsolutions.mobi');

//define("WEBMASTER_EMAIL", 'lokesh@imsolutions.mobi');for test mail

//error_reporting(E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

function ValidateEmail($value)
{
    $regex = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';

    if ($value == '') {
        return false;
    } else {
        $string = preg_replace($regex, '', $value);
    }

    return empty($string) ? true : false;
}

if ($post) {
    $name = stripslashes(trim($_POST['name']));
    $email = trim($_POST['email']);
    $phone = stripslashes(trim($_POST['phone']));
 
    $query = stripslashes($_POST['message']);
   $captcha = $_POST['g-recaptcha-response'];
    $subject = 'Enquiry from Maangalya Signature Emailer Popup Form';

    //$sql = "SELECT * FROM `home_page_otp` WHERE `otp`='$otp' and `phone_no`='$phone'";
    //$re = mysqli_query($conn, $sql);
    //$result = mysqli_fetch_array($re);
    //$checkotp = $result['otp'];
    //die();
    //$ip           =   $_SERVER['REMOTE_ADDR'];
    //$details  = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    //var_dump($details);
    //$details->region.'<br/>';
    //$details->city.'<br/>';

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
    if (!$phone) {
        $error .= 'Please enter your phone.<br />';
        die('<p style="color:red;">Please enter your phone</p>');
    }
    if (!$query) {
        $error .= "Please enter your message.<br />";
        die('<p style="color:red;">Please enter your message</p>');
    }
   if (!$captcha) {
    $error .= 'Please Verify Captcha.<br />';
    die('<p style="color:red;">Please Verify Captcha</p>');
}

    /*if ($_POST['captcha'] != $_SESSION['captcha']) {
    //  $error .= 'Please enter valid captcha.<br />';
    //die('<p style="color:red;">Please enter valid captcha</p>');
    }
     */
    

    /*if (!$captchaRes) {
    $error .= 'Please enter valid captcha.<br />';
    die('<p style="color:red;margin: 3px;line-height: 17px;">Please enter valid captcha</p>');
    }*/

    //$subject ="Response From IM Solutions For RR Builddcon";

    $email_name = "Maangalya Signature";
    $email_to = "noreply@maangalyaprojects.com";

    $headers = 'MIME-Version: 2.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: ' . $email_name . ' <' . $email_to . '>' . "\r\n";

    $message = '<table cellspacing="0" cellpadding="0" style="width:100%; border-bottom:1px solid #eee; font-size:12px; line-height:135%">


		<tr align="center">
			<td colspan="3" style="text-align:center;">
				<img src="http://www.maangalyasignature.co/img/logo.png">
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
                <th style="vertical-align:top; color:#222; text-align:left; padding:7px 9px 7px 9px; border-top:1px solid #eee">Looking for <span style="color:red">*</span></th>
                        <td style="vertical-align:top; color:#333; width:60%; padding:7px 9px 7px 0; border-top:1px solid #eee">' . $query . '</td>
        </tr>

</table>';

    
    $response = $_POST['g-recaptcha-response'];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$key = '6Ld9Wb4UAAAAAAf2XQAZVasm1sLPL2MKDuVaCK4E';
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
//var_dump($result);
if ($result === false) {
    echo 'Failed to contact reCAPTCHA';
} else {
    $result = json_decode($result);
    if ($result->success) {
         echo "OK";
        ini_set("sendmail_from", WEBMASTER_EMAIL); // for windows server
        $mail = mail(WEBMASTER_EMAIL, $subject, $message, $headers, '-freturn@maangalyaprojects.com');
        $mail2 = mail(WEBMASTER_EMAIL1, $subject, $message, $headers, '-freturn@maangalyaprojects.com');
        $mail3 = mail(WEBMASTER_EMAIL2, $subject, $message, $headers, '-freturn@maangalyaprojects.com');
        $mail4 = mail(WEBMASTER_EMAIL3, $subject, $message, $headers, '-freturn@maangalyaprojects.com');

        if ($mail || $mail2 || $mail3 || $mail4) {
            $mail1 = mail($email, 'Thanks for contacting us', '<h4>Thank you for contacting Maangalya Signature ! Our team will get in touch with you shortly. Appreciate your patience.</h4>', $headers, '-freturn@maangalyaprojects.com');
            // $_SESSION['thanks'] = "thanks";
            //  $_SESSION['project'] = $project;
           
            /////////////////////////////////google sheet code start here/////////////////////////
            /////////////////////note always upload google folder to new server otherwise it's not work because we include google folder in this project///////////////////////////////////////

            date_default_timezone_set('Asia/Kolkata');
           
            include './../../google/vendor/autoload.php';

            $client = new Google_Client();
            $client->setApplicationName('google sheet');
            $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
            $client->setAccessType('offline');
            $client->setAuthConfig('./../../google/My Project 34423-e76a5ec1940f.json');
            $service = new Google_Service_Sheets($client);
            $spreadsheetId = "1NBp7n1lmkCSeZ_OePnCi1v0h0Cp4Rj01MtbHAtXUHGg"; // 1nkL--3PL7GkDPoc16iOvIp5pkC-ZNjH6DunaqBnEm2k
            //key  AIzaSyCNh9u_soB83I8DBjl6tZ81K6zrtI0LZtc

            $range = "A1:E1";

            $values = [
                [$name, $email, $phone, $query, date('d-m-Y H:i'), 'Landing Page - Popup Form'],
            ];
            $body = new Google_Service_Sheets_ValueRange([
                'values' => $values,
            ]);
            $params = [
                'valueInputOption' => 'RAW',
            ];
            $insert = [
                'insertDataOpton' => "INSERT_ROWS",
            ];
            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params, $insert);
/////////////////////////////////google sheet code end here/////////////////////////

        }

    } else {
        $error = true;
        echo '<h2 style="color:red !important">You are spammer</h2>';
    }

}
    
   
}