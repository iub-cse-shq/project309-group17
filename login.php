<?php 
session_start(); 
include "config.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['uname']);
	$password = validate($_POST['password']);

	if(empty($username)) {
		header("Location: userlogin.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: userlogin.php?error=Password is required");
	    exit();
	}else{
		//to prevent from mysqli injection 
	    $username = mysqli_real_escape_string($con, $username);
	    $password = mysqli_real_escape_string($con, $password);

		$sql = "select * from users where username = '$username' and password = '$password'";  
	    $result = mysqli_query($con, $sql);  
	    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
	    $count = mysqli_num_rows($result);

		if ($count === 1) {
        	$_SESSION['username'] = $row['username'];
        	$_SESSION['id'] = $row['id'];
        	header("Location: display.php");
	        exit();
		}else{
			header("Location: userlogin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: userlogin.php");
	exit();
}