<?php 
    session_start();
    include("config.php");
    $error = "";

    if (isset($_POST['login'])) {
        $user = mysqli_real_escape_string($con, $_POST['user']); // Utilisez mysqli_real_escape_string pour éviter les injections SQL
        $pass = $_POST['pass']; // Le mot de passe ne doit pas être modifié ici

        if (!empty($user) && !empty($pass)) {
            $query = "SELECT auser, apass FROM admin WHERE auser='$user'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $num_row = mysqli_num_rows($result);

            if ($num_row == 1) {
                $row = mysqli_fetch_array($result);
                $stored_hash = $row['apass'];
                if (password_verify($pass, $stored_hash)) { // Utilisez password_verify pour vérifier le mot de passe hashé
                    $_SESSION['auser'] = $user;
                    header("Location: dashboard.php");
                    exit(); // Assurez-vous de terminer le script après la redirection
                } else {
                    $error = '* Nom d’utilisateur et mot de passe invalides';
                }
            } else {
                $error = '* Nom d’utilisateur et mot de passe invalides';
            }
        } else {
            $error = "* S’il vous plaît remplir tous les champs!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>AH Admin - Login</title>
		
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
								<h1>Panneau Admin connexion</h1>
								<p class="account-subtitle">Accès à notre tableau de bord</p>
								<p style="color:red;"><?php echo $error; ?></p>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input class="form-control" name="user" type="text" placeholder="nom d'utilisateur">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="pass" placeholder="Mot de passe">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" name="login" type="submit">connexion</button>
									</div>
								</form>
								
																
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