<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'email.php';

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit;
}



function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$email = $_POST['email'];
$email = test_input($email);
$password = $_POST['password'];
$password = md5(md5(test_input($password)));

$sql = "SELECT email FROM `user` WHERE `email` = :email";
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($sql);
if($stmt->execute(['email' => $email])){
	if($rows = $stmt->fetch() > 0){
		$error = "用户名已存在，请换个其他的用户名";
		exit;
	}
}


$regtime = time();
$token = md5($email.$password.$regtime);
$token_exptime = time()+60*60*24;


//email 
$subject = "Oakland University";
$sender = "Oakland University";
$emailBody = "亲爱的：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/><a href='http://localhost:8888/demo/active.php?verify=".$token."' target='_blank'>http://www.lifewithjourneys.com/demo/register/active.php?verify=".$token."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- Hellwoeba.com 敬上</p>";
	
		
$sql = "INSERT INTO `user`(`email`, `password`, `token`, `token_exptime`, `regtime`) VALUES (:email,:password,:token,:token_exptime, :regtime)";

$stmt = $conn->prepare($sql);

if($stmt->execute(
			array(
				':email'=> $email,
				':password'=> $password,
				':token'=> $token,
				':token_exptime' => $token_exptime,
				':regtime'=> $regtime
				)
		));

$insert_id = $conn->lastinsertid();

if($insert_id){

	\EMAIL\sendEmail\sendEmail($email,$subject, $sender, $emailBody); 


}
			
	

	
?>