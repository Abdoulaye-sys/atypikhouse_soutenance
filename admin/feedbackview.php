<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>AP House | Admin</title>
		
		<!-- Favicon -->
		<link rel="icon" type="images/png" href="..\images\favicon-16x16.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
		
		
			<!-- Header -->
				<?php include("header.php"); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Commentaire</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Tableeau de bord</a></li>
									<li class="breadcrumb-item active">commentaire</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Liste des Commentaires</h4>
									<small>Ici, l’utilisateur peut sélectionner des commentaires pour afficher comme témoignage. Remarque: Statut "1" définit le commentaire comme témoignage.</small>
									<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];
											
										?>
								</div>
								<div class="card-body">

									<table id="basic-datatable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom</th>
                                                    <th>E-mail</th>
                                                    <th>Commentaire</th>
													<th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select feedback.*, user.* from feedback,user where feedback.uid=user.uid");
												$cnt=1;
												while($row=mysqli_fetch_array($query))
													{
											?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['uname']; ?></td>
                                                    <td><?php echo $row['uemail']; ?></td>
                                                    <td><?php echo $row['2']; ?></td>
                                                    <td><?php echo $row['3']; ?></td>
													<td><a href="feedbackedit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info">Modifier</button></a>
                                                    <a href="feedbackdelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Supprimer</button></a></td>
                                                </tr>
                                                <?php
												$cnt=$cnt+1;
												} 
												?>
                                               
                                            </tbody>
                                        </table>
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
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.select.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatables/buttons.flash.min.js"></script>
		<script src="assets/plugins/datatables/buttons.print.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>
