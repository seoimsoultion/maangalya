<?php error_reporting(0);

	 $DBhost = "localhost";
	 $DBuser = "maangalya_co";
	 $DBpass = "RSf3jn~+z)K7";
	 $DBname = "maangalya_co";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
     $con= mysqli_connect('localhost', 'maangalya_co', 'RSf3jn~+z)K7', 'maangalya_co');

