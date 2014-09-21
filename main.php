<?php
include('../config.php');
include('functions.php');
$sh_users=$shdb->query('SELECT * FROM users where iss2o<>1 LIMIT 0, 100');
$sh_users=$shdb->get();
foreach ($sh_users as $user){
	$randpass=rand_string(5);

	$email=$user['email'];
	$username=$user['username'];
	$password=hash('sha256', $salt . $randpass);
	$joinStamp=$user['reg_date'];
	$activityStamp=$user['lastlogin_date'];
	$accountType='290365aadde35a97f11207ca7e4279cc';
	$joinIp=$user['reg_ip'];
		$fullname=$user['fullname'];
	
	
	$ow_users_tpl=$ow_prefix.'base_user';
	$ow_question_tpl=$ow_prefix.'base_question_data';
	$owdb->query("INSERT INTO $ow_users_tpl (email,username,password,joinStamp,activityStamp,accountType,emailVerify,joinIp) VALUES ('$email','$username','$password','$joinStamp','$activityStamp','$accountType','1','$joinIp')");
	$ow_uid=$owdb->id();
	$owdb->query("INSERT INTO $ow_question_tpl (questionName,userId,textValue) VALUES ('realname','$ow_uid','$fullname')");
	mailman($email,$randpass);
	$shdb->query("UPDATE users SET iss2o='1' WHERE email='$email'");
}


header('Location: ../convert.php?state=1');
?>
