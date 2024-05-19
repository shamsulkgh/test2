<?php

if(!empty($_POST['iv']))
{
	if(strlen($_POST['iv'])==16){
	
	    $string=$_POST['string'];
    	$password =$_POST['pass'];
    	$method = "AES-256-CBC"; //**
    	$iv = $_POST['iv'];

    	$encrypted_string=openssl_encrypt($string, $method, $password, 0, $iv);
    	response(200,"Valid Request",$encrypted_string);
	
	}
    else{
    	response(400,"Invalid Request. The seed is not 16 bytes long",NULL);
    }

}
else
{
    response(400,"Invalid Request. The seed is empty. It should be 16 bytes long.",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);

	//echo $status_message

    echo $data;
}

?>
