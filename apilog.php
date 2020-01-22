<?php

$input = array (

    'channel_partner'=> '962965358',
	'phonefax' => '1234567890',
    'f_name' =>'xavier',
	'l_name' =>'',
	'email'=>'testng@gmail.com',
	'projectname'=>'Maangalya Signature',
	'notes' => 'testing',
	'subject'=> 'Lead from channel partner'
    );
    
    $url = 'http://cloud.paramantra.com/paramantra/index.php/api/channel_partner/gneLead/format/json';
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
		var_dump($data_resp);
        curl_close($ch);
		
		
?>