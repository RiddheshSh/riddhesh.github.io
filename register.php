<?php
	$username=$_POST['username'];
    $UserID=$_POST['UserID'];
	$Gmail=$_POST['Gmail'];

	// Database connection
	$conn = new mysqli('localhost','RS','1234','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users(username, UserID,Gmail) values(?, ?,?)");
		$stmt->bind_param("sss", $username, $UserID,$Gmail);
		$execval = $stmt->execute();
		echo $execval;
		//header('Location: /display.php',true);
		echo "Registered successfully...";
		// $query=$conn->prepare("select * from users"); 
		// $result=$query->execute(); 
		// echo $result;
		// $query->close();
		$stmt->close();
		$conn->close();
	}
?>
