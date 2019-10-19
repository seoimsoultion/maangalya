<?php error_reporting(0);

	 $DBhost = "localhost";
	 $DBuser = "maangalya_co";
	 $DBpass = "RSf3jn~+z)K7";
	 $DBname = "maangalya_co";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }



  

  // gets the user IP Address
  $user_ip = $_SERVER['REMOTE_ADDR'];

  $check_ip = $DBcon->query("select userip from pageview where page='yourpage' and userip='$user_ip'");
  if($check_ip->num_rows()>=1)
  {
	
  }
  else
  {
    $insertview = $DBcon->query("insert into pageview values('','yourpage','$user_ip')");
	$updateview = $DBcon->query("update totalview set totalvisit = totalvisit+1 where page='yourpage' ");
  }
?>

<html>
<head>
</head>

<body>
  <?php
    $stmt = $DBcon->query("select totalvisit from totalview where page='yourpage' ");
  ?>

  <p>This page is viewed <?php echo $stmt->num_rows();?> times.</p>

</body>
</html>