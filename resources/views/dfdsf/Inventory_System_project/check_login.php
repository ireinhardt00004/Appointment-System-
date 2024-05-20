<?php
session_start();
include("configuration.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	function test_input($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	if ($username == 'admin') {
		$role = 'admin';
	}
	else{
		
		$role = 'student';
	}
	}

	if (empty($username)) {
		header("Location: login.php?error=User Name is Required");
	}elseif (empty($password)) {
		header("Location: login.php?error=Password is Required");
	}
	elseif ($role == 'admin') {
		$username = sha1($username);
		$password = sha1($password);
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		
        $result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			//the username must be unique
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] === $password && $row['role'] === $role) {
				 $_SESSION[ 'name'] =$row['name'];
				 $_SESSION[ 'std_num'] =$row['std_num'];
				 $_SESSION[ 'role'] =$row['role'];
				 $_SESSION[ 'username'] =$row['username'];

				 header("Location: admin.php");
			}else{
				header("Location: index.php?error=Username or password is invalid");
			}
		}else{
				header("Location: index.php?error=Username or password is invalid");
		}
	}
	elseif ($role == 'student') {
		$username = sha1($username);
		$password = sha1($password);
	
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		
        $result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			//the username must be unique
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] === $password && $row['role'] === $role) {				
				 $_SESSION[ 'name'] =$row['name'];
				 $_SESSION[ 'std_num'] =$row['std_num'];
				 $_SESSION[ 'role'] =$row['role'];
				 $_SESSION[ 'username'] =$row['username'];

				 header("Location: student.php");
			}else{
				header("Location: index.php?error=Username or password is invalid");
			}
		}else{
				header("Location: index.php?error=Username or password is invalid");
		}
	}

?>