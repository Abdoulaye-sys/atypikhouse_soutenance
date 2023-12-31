<?php 
include("config.php");
$error = "";
$msg = "";

if (isset($_POST['insert'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = $_POST['pass']; // Le mot de passe ne doit pas être modifié ici
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    if (!empty($name) && !empty($email) && !empty($pass) && !empty($dob) && !empty($phone)) {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT); // Hasher le mot de passe

        $sql = "INSERT INTO admin (auser, aemail, apass, adob, aphone) VALUES ('$name', '$email', '$hashed_pass', '$dob', '$phone')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $msg = 'Inscription Administrateur réussi';
        } else {
            $error = '* Inscription Administrateur échouée Réessayez';
        }
    } else {
        $error = "* Veuillez remplir tous les champs!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin  - Création de compte</title>
		
		<!-- Favicon -->
		<link rel="icon" type="images/png" href="..\images\favicon-16x16.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="page-wrappers login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Création de compte</h1>
								<p class="account-subtitle">Accès à notre tableau de bord</p>
								<p style="color:red;"><?php echo $error; ?></p>
								<p style="color:green;"><?php echo $msg; ?></p>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Nom" name="name">
									</div>
									<div class="form-group">
										<input class="form-control" type="email" placeholder="E-mail" name="email">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Mot de passe" name="pass">
									</div>
									<div class="form-group">
										<input class="form-control" type="date" placeholder="Date de naissance" name="dob">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Téléphone" name="phone" maxlength="10">
									</div>
									<div class="form-group mb-0">
										<input class="btn btn-primary btn-block" type="submit" name="insert" Value="Inscription">
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">ou</span>
								</div>
								
								<!-- Social Login -->
								<div class="social-login">
									<span>Inscrivez-vous avec</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
									<a href="#" class="google"><i class="fa fa-google"></i></a>
									<a href="#" class="facebook"><i class="fa fa-twitter"></i></a>
									<a href="#" class="google"><i class="fa fa-instagram"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Vous avez déjà un compte? <a href="index.php">Se connecter</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

</html>