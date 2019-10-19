<?php 

### EDIT HERE ###

// DB CONNECT INFO
$db_host = "localhost";
$db_name = "maangalya_co";
$db_user = "maangalya_co";
$db_pw = "RSf3jn~+z)K7";

// DB TABLE INFO
$GLOBALS['hits_table_name'] = "page_count";
$GLOBALS['info_table_name'] = "totlepage";

### STOP EDITING HERE ###

// CONNECT TO DB
try {   
	$GLOBALS['db'] = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_user, $db_pw, array(PDO::ATTR_PERSISTENT => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false));  
}  
catch(PDOException $e) {  
    echo $e->getMessage();
}

?>