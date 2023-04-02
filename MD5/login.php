<?php
#error_reporting(E_ERROR | E_PARSE);
/* emulate user record from database */
$credentials=[
	'admin'=>'e1964798cfe86e914af895f8d0291812',
	'JohnMcClain'=>'508d0a3f503ce10c064523fd2ae897d4',
	'user'=>'04dac8afe0ca501587bad66f6b5ce5ad'];

function login(){
	global $credentials;
	return array_key_exists($_POST['login'],$credentials) && 
	strcmp( md5($_POST['password']),$credentials[ $_POST['login'] ])===0;
}
$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
if ($_POST['login']){
	if (login()==true){
		header($protocol.' 200 OK');
		echo '{"message":"User signed in"}';
		exit;
	}
}
header($protocol.' 401 Unauthorized');
exit;
?>
