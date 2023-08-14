<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_POST['uid'];
	$feature=$_POST['feature'];
	
	$totalfloor=$_POST['totalfl'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];

	$isFeatured=$_POST['isFeatured'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"property/$aimage");
	move_uploaded_file($temp_name1,"property/$aimage1");
	move_uploaded_file($temp_name2,"property/$aimage2");
	move_uploaded_file($temp_name3,"property/$aimage3");
	move_uploaded_file($temp_name4,"property/$aimage4");
	
	move_uploaded_file($temp_name5,"property/$fimage");
	move_uploaded_file($temp_name6,"property/$fimage1");
	move_uploaded_file($temp_name7,"property/$fimage2");
	
	$sql="INSERT INTO property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,state,feature,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,totalfloor,isFeatured)
	VALUES('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$state','$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor','$isFeatured')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Propriété insérée avec succès</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Quelque chose a mal tourné. Veuillez réessayer</p>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>AP House | Property</title>
		
		<!-- Favicon -->
		<link rel="icon" type="images/png" href="..\images\favicon-16x16.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		
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
								<h3 class="page-title">Propriété</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Tableau de bord</a></li>
									<li class="breadcrumb-item active">Propriété</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Ajouter des détails sur la propriété</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
									<h5 class="card-title">Détail de la propriété</h5>
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Titre</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="Entrez le titre">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Contenu</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Type de propriété</label>
													<div class="col-lg-9">
														<select class="form-control" required name="ptype">
															<option value="">Selectionnez le type de propriété</option>
															<option value="apartment">Appartement</option>
															<option value="flat">Plat</option>
															<option value="building">Batiment</option>
															<option value="house">Maison</option>
															<option value="villa">Villa</option>
															<option value="office">Bureau</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Type de vente</label>
													<div class="col-lg-9">
														<select class="form-control" required name="stype">
															<option value="">Selectionnez le type de vente</option>
															<option value="rent">Louer</option>
															<option value="sale">Vente</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Salle de bain</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bath" required placeholder="Entrez  la salle de bain (seulement pas de 1 à 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Cuisine</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc" required placeholder="Entrez la cuisine (seulement pas de 1 à 10)">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">BHK</label>
													<div class="col-lg-9">
														<select class="form-control" required name="bhk">
															<option value="">Select BHK</option>
															<option value="1 BHK">1 BHK</option>
															<option value="2 BHK">2 BHK</option>
															<option value="3 BHK">3 BHK</option>
															<option value="4 BHK">4 BHK</option>
															<option value="5 BHK">5 BHK</option>
															<option value="1,2 BHK">1,2 BHK</option>
															<option value="2,3 BHK">2,3 BHK</option>
															<option value="2,3,4 BHK">2,3,4 BHK</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Chambre à coucher</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bed" required placeholder="Entrez la chambre à coucher (seulement pas de 1 à 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcon</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc" required placeholder="Entrez le balcon (seulement pas de 1 à 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Salle</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="hall" required placeholder="Entrez salle (seulement pas de 1 à 10)">
													</div>
												</div>
												
											</div>
										</div>
										<h4 class="card-title">Prix et emplacement</h4>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Sol</label>
													<div class="col-lg-9">
														<select class="form-control" required name="floor">
															<option value="">Sélectionner un étage</option>
															<option value="1st Floor">1er étage</option>
															<option value="2nd Floor">2e étage</option>
															<option value="3rd Floor">3e étage</option>
															<option value="4th Floor">4e étage</option>
															<option value="5th Floor">5e étage</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Prix</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required placeholder="Entrez le prix">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ville</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="Entrez la ville">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Pays</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required placeholder="Entrez le pays">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Étage total</label>
													<div class="col-lg-9">
														<select class="form-control" required name="totalfl">
															<option value="">Selectionnez l'etage</option>
															<option value="1 Floor">1 étage</option>
															<option value="2 Floor">2 étage</option>
															<option value="3 Floor">3 étage</option>
															<option value="4 Floor">4 étage</option>
															<option value="5 Floor">5 étage</option>
															<option value="6 Floor">6 étage</option>
															<option value="7 Floor">7 étage</option>
															<option value="8 Floor">8 étage</option>
															<option value="9 Floor">9 étage</option>
															<option value="10 Floor">10 étage</option>
															<option value="11 Floor">11 étage</option>
															<option value="12 Floor">12 étage</option>
															<option value="13 Floor">13 étage</option>
															<option value="14 Floor">14 étage</option>
															<option value="15 Floor">15 étage</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Taille de la zone</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required placeholder="Entrez la taille de la zone  (en m²)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Adresse</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="Entrez l'adresse">
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Fonctionnalité</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Important Veuillez ne pas supprimer le contenu ci-dessous, modifiez uniquement Oui ou Non ou les détails et n'ajoutez pas plus de détails</p>
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												<!---feature area start--->
												<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Âge de la propriété : </span>10 Years</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Piscine : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Stationnement : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Apartment</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Sécurité : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Capacité de restauration : </span>10 People</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Église/Temple  : </span>No</li>
														
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Tiers : </span>No</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Alivator : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Approvisionnement en eau : </span>Ground Water / Tank</li>
														</ul>
													</div>
												<!---feature area end---->
											</textarea>
											</div>
										</div>
												
										<h4 class="card-title">Image et statut</h4>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Statut</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Selectionnez le statut</option>
															<option value="disponible">Disponible</option>
															<option value="vendu">Vendu</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image du plan d'étage du sous-sol</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Uid</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="uid" required placeholder="Entrez le code d’utilisateur (seulement le numéro)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image du plan d'étage</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image du plan du rez-de-chaussée</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>
											</div>
										</div>

										<hr>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label"><b>est en vedette ?</b></label>
													<div class="col-lg-9">
														<select class="form-control"  required name="isFeatured">
															<option value="">Selectionnez...</option>
															<option value="0">Non</option>
															<option value="1">Oui</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										
											<input type="submit" value="Soumettre" class="btn btn-primary"name="add" style="margin-left:200px;">
										
								</div>
								</form>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>