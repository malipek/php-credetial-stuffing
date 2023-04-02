<?php
#error_reporting(E_ERROR | E_PARSE);
/* emulate user record from database */
$credentials=[
	'admin'=>'$argon2id$v=19$m=65536,t=4,p=1$b3czLkt3YzBDaURWNEo4aQ$TVHYoZEOujaNV9wima8DPUjUgAPZplFRDb+vZINXneM',
	'JohnMcClain'=>'$argon2id$v=19$m=65536,t=4,p=1$dVlZbklYWE1BVXloVEFNOA$lqmoFhVxzCoGfMlV3jjVYCN6/zt0qHXPKZ+Y23HZK9E',
	'user'=>'$argon2id$v=19$m=65536,t=4,p=1$Ty5jZ2o5eU5UZ1luLldpZQ$1HgTBTmy6rubSGvkywKC+kbnOSfdx7r42wj7bIKOecE'];

function login(){
	global $credentials;
	return array_key_exists($_POST['login'],$credentials) && 
	password_verify( $_POST['password'], $credentials[ $_POST['login'] ]);
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
