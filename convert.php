<?php
include('config.php');
echo '<h2>Sharetronix to Oxwall user\'s DB converter<br><a href="http://www.webcs.ir/oxwall" target="_blank">Powered by Pesrian Oxwall group</a></h2><br><br>==> now connected to DB\'s<br>';
if(is_file('setup.txt')){
	$isalter= file_get_contents('setup.txt');
}
if($isalter==1){}else{
	$shdb->query('ALTER TABLE `users` ADD `iss2o` INT NOT NULL ;');
	echo '==> ALTER your Sharetronix users database<br>';
	//file ...
	$myFile = "setup.txt";
	$fh = fopen($myFile, 'w');
	fwrite($fh, 1);
	fclose($fh);
	//
}
$sh_users=$shdb->query('SELECT * FROM users where iss2o<>1');$sh_users=$shdb->get();
$sh_record=count($sh_users);echo '==> there are <b>'.$sh_record.'</b> Not transferred users in your first DB<br><br>';
if($_GET['state']==1){echo '<h3 style="color:white;background:#15a125;text-align:center">100 users has been transferred successfully<br> new password has been sent to all of them</h3>';}
echo '<div align="center"><form action="controller/main.php" method="post"><input type="submit" value="Go for next 100 users !" style="font-size:25px" /></form></div>';
?>
