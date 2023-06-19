<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: main.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM tbuser WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: main.php");
	} else {
		echo "<script>alert('Woops! Username Atau Password anda Salah.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">

	<title>E-KTP</title>
</head>
<body>
	<header>
		<img src="image/Disdukcapil.png" width="350" height="100">
	</header>
	<div class="container">
		<div class="box-content">
				<form action="" method="POST">
					<div class="title-login">
						<h1 class="login-text">SILAHKAN LOGIN </h1>
					</div>
					<div class="box-form" style="margin-bottom: 27px">
						<div class="inputName">
							<label for="username">Username</label><br>
							<input type="text" placeholder="Masukkan Username Anda" name="username" value="<?php echo $username; ?>" required>
						</div>
						<div class="inputPass">
							<label for="username">Password</label><br>
							<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
						</div>
						<div class="inputSub">
							<button name="submit" class="btn"> Login </button>
						</div>
						<div class="inputReg">
							<button name="submit" class="btnReg"><a href="register.php">Belum Punya Akun? Registrasi Disini</a></button>
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
