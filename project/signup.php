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
		<title>Signup Page</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel='stylesheet' href='https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css'><link rel="stylesheet" href="style.css">
	</head>
	<body>
		<main class="main">
			<div class="container">
				<section class="wrapper">
					<div class="heading">
						<h1 class="text text-large">Signup</h1>
						<p class="text text-normal">Signup?<span><a href="login" class="text text-links">Login</a></span>
						</p>
					</div>
					<form action="nedmin/islem.php" method="POST" name="login" class="form">
						<div class="input-control">
							<label for="full_name" class="input-label" hidden>Your Name</label>
							<input type="text" name="full_name" class="input-field" placeholder="Your Name" required>
						</div>
						<div class="input-control">
							<label for="email" class="input-label" hidden>Email</label>
							<input type="text" name="email" class="input-field" placeholder="Email" required>
						</div>
						<div class="input-control">
							<label for="pass_hash" class="input-label" hidden>Password</label>
							<input type="password" name="pass_hash" class="input-field" placeholder="Password" required>
						</div>
						<div class="input-control">
							<label for="dep" class="input-label" hidden>Department</label>
							<input type="text" name="dep" class="input-field" placeholder="Department" required>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="usr_type" value="0" id="usr_type" checked>
							<label class="form-check-label" for="usr_type">Student</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="usr_type" value="1" id="usr_type" >
							<label class="form-check-label" for="usr_type">Teacher</label>
						</div>
						<div class="input-control">
							<a href="#" class="text text-links"> </a>
							<input type="submit" name="signup" class="input-submit" value="Hesap Oluştur">
						</div>
					</form>
				</section>
			</div>
		</main>
		<?php include'notifi.php'; ?>
	</body>
</html>
