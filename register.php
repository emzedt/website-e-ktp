<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM tbuser WHERE username='$username'";
		$role = 1;
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO tbuser (username, password, idrole)
					VALUES ('$username', '$password', '$role')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Username Already Exists.')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
	<title>E-KTP</title>
</head>
<body>
	<header>
		<img src="image/Disdukcapil.png" width="350" height="100">
	</header>
	<div class="container">
		<div class="box-content">
			<form action="" method="POST" class="login-email">
				<div class="title-regis">
					<h1 class="regis-text">SILAHKAN REGISTRASI </h1>
				</div>
				<div class="box-form">
					<div class="inputName">
						<label for="username">Username</label><br>
						<input type="text" placeholder="Masukkan Username Anda" name="username" value="<?php echo $username; ?>" required>
					</div>
					<div class="inputPass">
						<label for="username">Password</label><br>
						<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
					</div>
					<div class="inputRePass">
						<label for="username">Re-Password</label><br>
						<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
					</div>
					<div class="inputReg">
						<button name="submit" class="btn"> Register </button>
					</div>
					<div class="inputLog">
							<button name="submit" class="btnLog"><a href="login.php">Sudah Punya Akun? Login Disini</a></button>
					</div>
				</div>
			</form>
			<footer>
				<h5>© COPYRIGHT| DISDUKCAPIL 2022</h5>
			</footer>
		</div>
	</div>
</body>
</html>