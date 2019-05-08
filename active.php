<?php 


include_once "conn.php";

$verify = stripslashes(trim($_GET['verify']));

// $now = time();

$sql = "SELECT `email`, `token_exptime` FROM `user` WHERE `status` = '0' AND `token`=:token";
$stmt = $conn->prepare($sql);

$stmt->execute(
	array(
    ':token'=>$verify
	)
);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];



if($row > 0 ){

if($now > $row['token_exptime']){

		$msg = 'Email activiation has expired. Please contact the help support to assist';


	}else{

		
		$sql = "UPDATE `user` SET `status` = 1 WHERE `email` = :email";
		$stmt = $conn->prepare($sql);
			
		
		$stmt->bindValue(':email',$email);

		$stmt->execute();
		
		if($row = $stmt->rowCount() ){

			header('Location: verifyUser.php');

		}



	}


}else{

	header('Location: 404.php');

	exit();
}



// 		$stmt = $conn->prepare($sql);

// 		$stmt->execute(
// 			array(':email' => $row['email'])
// 		);

// 		if($stmt->rowCount()){

// 			  $msg = '认证成功！';
			
// 		}else{
// 			  $msg = '服务器忙！';
// 		}




// 	}else{


// 		$msg = "error";


// 	}

// }







 ?>