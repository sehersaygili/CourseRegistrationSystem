<?php
	session_start();
	include 'nedmin/baglanti.php';
?>

<?php
	function isLoggedUser(){
		if(isset($_SESSION['email'])){
			return 1;
		}
		else{
			return 0;
		}
	}

	if (isLoggedUser()) {
		header("Location:index");
	}

 ?>

<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="UTF-8">
		<title>Login Page</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel='stylesheet' href='https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css'>
		<link rel="stylesheet" href="style.css">

	</head>
	<body>
		<main class="main">
			<div class="container">
				<section class="wrapper">
					<div class="heading">
						<h1 class="text text-large">Login</h1>
						<p class="text text-normal">Create New Account <span><a href="signup" class="text text-links">Signin</a></span>
						</p>
					</div>
					<form action="nedmin/islem.php" method="POST" name="login" class="form">
						<div class="input-control">
							<label for="email" class="input-label" hidden>Email</label>
							<input type="email" name="email" class="input-field" placeholder="Email Address" required>
						</div>
						<div class="input-control">
							<label for="password" class="input-label" hidden>Password</label>
							<input type="password" name="password" class="input-field" placeholder="Password" required>
						</div>
						<div class="input-control">
							<a href="#" class="text text-links">Forgotten Password?</a>
							<input type="submit" name="login" class="input-submit" value="login">
						</div>
					</form>
				</section>
			</div>
		</main>

		<?php include'notifi.php'; ?>
	</body>
</html>
