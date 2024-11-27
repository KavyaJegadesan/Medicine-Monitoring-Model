<?php

	session_start();

	include('file_functions.php');
	
	if(isset($_SESSION['normal_user']))
	{
		header("location:app.php");
	}
	$error = "Welcome Back";
   
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// username and password sent from form 

		$username = $_POST['username']; 
		$password = $_POST['password'];
		
		if(!empty($_POST['username']) AND !empty($_POST['password']))
		{
			$length = get_ini_value_in("users.ini", "keys", "auto_increment_last_index");
			
			for($i = 1; $i <= $length; $i++)
			{
				if($username == get_ini_value_in("users.ini", "username", $i) and $password == get_ini_value_in("users.ini", "password", $i))
				{
					$_SESSION['normal_user'] = $username;
					$_SESSION['user_id'] = $i;
					header("location: app.php");
				}
			}
			
			$error = "Your Login Name or Password is invalid";
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Enter all details correctly")';
			echo '</script>';	
		}
		/* For Login with No Registration Page
		
		if($username === 'user' && $password === 'password')
		{
			$_SESSION['normal_user'] = $username;
			header("location: app.php");
		}
	   else 
		{
			$error = "Your Login Name or Password is invalid";
		}
		
		*/
	}
?>
<!DOCTYPE html>
<html >

<head>
	<meta charset="UTF-8">
	<title>Blockchain Based Counterfeit Drugs Prevention System - Login</title>	
	
	<link rel="stylesheet" href="css/reset.min.css">
	<link rel="stylesheet" href="css/style.php?theme=green">	
</head>

<body>
	<div class="pen-title">
		<h1>Blockchain Based Counterfeit Drugs Prevention System</h1>
	</div>
<!-- Form Module-->
<div class="module form-module form-module-small">
  <div class="form">
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form method="post">
      <input type="text" name="username" placeholder="Username"/>
      <input type="password" name="password" placeholder="Password"/>
      <button>Login</button>
    </form>
  </div>
  <div class="cta"><a href="#"><?php echo $error; ?></a></div>
</div>

</body>
</html>