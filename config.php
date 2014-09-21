<?php
include('mysqli.php');

$config1 = array();
$config1['host'] = 'localhost';
$config1['user'] = 'user';//sharetronix database username
$config1['pass'] = '123456';//sharetronix database password
$config1['table'] = 'sharet';//sharetonix database name
$shdb = new DB($config1);

$config2 = array();
$config2['host'] = 'localhost';
$config2['user'] = 'user';//oxwall database username
$config2['pass'] = '123456';//oxwall database password
$config2['table'] = 'test';//oxwall database name
$owdb = new DB($config2);
$salt='50b3cdc57b746';//it is very important ! you are find it here : ow_includes\config.php (line : define('OW_PASSWORD_SALT', '50b3cdc57b746');)
$ow_prefix='ow_';//the database prefix of oxwall , find it in config file

function mailman($to,$password){
	$msg='hi , your password has been changed, your new password is : '.$password;//body of new password mail message
	$from='no_reply@example.com';//mail from ???
	$subject = "your password has been change";//subject of the mail !
	$headers = "From:" . $from;
	mail($to,$subject,$msg,$headers);	
}
?>
