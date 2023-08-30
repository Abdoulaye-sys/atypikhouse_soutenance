<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
// $error_message = "";

// if (!isset($_SESSION['uemail'])) {
//     $_SESSION['error_message'] = "Veuillez vous connecter pour effectuer une réservation.";
//     header("Location: login.php");
//     exit();
// }

								
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
    .form-label {
        color: #28a745;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
    }
</style>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Real Estate PHP">
<meta name="keywords" content="">
<meta name="author" content="Unicoder">
<link rel="icon" type="images/png" href="images\favicon-16x16.png">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!--	Title
	=========================================================-->
<title>Atypik House</title>
</head>
<body>

    <?php
    // Inclure votre fichier de configuration de la base de données
    include 'config.php';

    // Vérifier si un identifiant de logement a été passé via l'URL
    if (isset($_GET['pid'])) {
        $property_id = $_GET['pid'];

        // Récupérer les détails du logement depuis la base de données en utilisant l'identifiant
        $query = "SELECT * FROM property WHERE pid = $property_id";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $property = mysqli_fetch_assoc($result);
    ?>
<!--	Header start  -->
<?php include("include/header.php");?>  
<!--	Header end  -->

<div class="full-row">
            <div class="container">
                <div class="row">

				
					<?php
						$id=$_REQUEST['pid']; 
						$query=mysqli_query($con,"SELECT property.*, user.* FROM `property`,`user` WHERE property.uid=user.uid and pid='$id'");
						while($row=mysqli_fetch_array($query))
						{
					  ?>
				  
                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-md-12">
                                <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;"> 
                                    <!-- Slide 1-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['18'];?>" class="ls-bg" alt="" /> </div>
                                    
                                    <!-- Slide 2-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['19'];?>" class="ls-bg" alt="" /> </div>
                                    
                                    <!-- Slide 3-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['20'];?>" class="ls-bg" alt="" /> </div>
									
									<!-- Slide 4-->
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['21'];?>" class="ls-bg" alt="" /> </div>
									
									<!-- Slide 5-->
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['22'];?>" class="ls-bg" alt="" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="mt-2 text-secondary text-capitalize"><?php echo $row['1'];?></h5>
                                <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i> &nbsp;<?php echo $row['14'];?></span>
                                <h2>Réserver ce logement</h2>
                                <form action="process_booking.php" method="post">
                                    <input type="hidden" name="property_id" value="<?php echo $_GET['pid']; ?>">
                                    <label class="form-label" for="arrival_date">Choisissez votre date d'arrivée :</label>
                                    <input type="date" name="arrival_date" required>
                                    <br>
                                    <label class="form-label" for="departure_date">Choisissez votre date de départ :</label>
                                    <input type="date" name="departure_date" required>
                                    <br>
                                    <!-- Autres champs et informations -->
                                    <br>
                                    <button class="btn btn-success d-none d-xl-block" style="border-radius:30px;" type="submit" name="submit">Réserver et Payer</button>
                                </form>



							</div>
                            <div class="col-md-6">
                                <div class="text-left text-md-right">Prix</div>
                                <div class="text-success text-left h5 my-2 text-md-right"><?php echo $row['13'];?>€ / nuit</div>

                            </div>
                        </div>
                        <div class="property-details">
                            <div class="bg-gray property-quantity px-4 pt-4 w-100">
                                <ul>
                                    <li><span class="text-secondary"><?php echo $row['12'];?></span> m²</li>
                                    <li><span class="text-secondary"><?php echo $row['6'];?></span> chambre</li>
                                    <li><span class="text-secondary"><?php echo $row['7'];?></span> salle de bain</li>
                                    <li><span class="text-secondary"><?php echo $row['8'];?></span> balcon</li>
                                    <li><span class="text-secondary"><?php echo $row['10'];?></span> Hall</li>
                                    <li><span class="text-secondary"><?php echo $row['9'];?></span> cuisine</li>
                                </ul>
                            </div>
                            <h4 class="text-secondary my-4">description</h4>
                            <p><?php echo $row['2'];?></p>
                            
                            <h5 class="mt-5 mb-4 text-secondary">Appartement</h5>
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td>BHK :</td>
                                            <td class="text-capitalize"><?php echo $row['4'];?></td>
                                            <td>Type de bien :</td>
                                            <td class="text-capitalize"><?php echo $row['3'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Rez-de-chaussée :</td>
                                            <td class="text-capitalize"><?php echo $row['11'];?></td>
                                            <td>Plancher total :</td>
                                            <td class="text-capitalize"><?php echo $row['28'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ville :</td>
                                            <td class="text-capitalize"><?php echo $row['15'];?></td>
                                            <td>pays :</td>
                                            <td class="text-capitalize"><?php echo $row['16'];?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="mt-5 mb-4 text-secondary">caractéristiques</h5>
                            <div class="row">
								<?php echo $row['17'];?>
								
                            </div>   
                            <h5 class="mt-5 mb-4 text-secondary">plans d'étage</h5>
                            <div class="accordion" id="accordionExample">
                                <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> plans d'étage </button>
                                <div id="collapseOne" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <img src="admin/property/<?php echo $row['25'];?>" alt="Not Available"> </div>
                                <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">sous-sol</button>
                                <div id="collapseTwo" class="collapse p-4" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <img src="admin/property/<?php echo $row['26'];?>" alt="Not Available"> </div>
                                <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">rez-de-chaussée</button>
                                <div id="collapseThree" class="collapse p-4" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <img src="admin/property/<?php echo $row['27'];?>" alt="Not Available"> </div>
                            </div>

                        </div>
                    </div>
					
					<?php } ?>
					
                    <div class="col-lg-4">
                        <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">propriété recommandée</h4>
                        <ul class="property_list_widget">
							
                            <?php 
                            $query=mysqli_query($con,"SELECT * FROM `property` WHERE isFeatured = 1 ORDER BY date DESC LIMIT 3");
                                    while($row=mysqli_fetch_array($query))
                                    {
                            ?>
                            <li> <img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['14'];?></span>
                                
                            </li>
                            <?php } ?>

                        </ul>

                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Propriété récemment ajoutée</h4>
                            <ul class="property_list_widget">
							
								<?php 
								$query=mysqli_query($con,"SELECT * FROM `property` ORDER BY date DESC LIMIT 7");
										while($row=mysqli_fetch_array($query))
										{
								?>
                                <li> <img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                    <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['14'];?></span>
                                    
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
        } else {
            echo "Logement non trouvé.";
        }

        // Libérer le résultat de la requête
        mysqli_free_result($result);
    } else {
        echo "Identifiant de logement manquant.";
    }

    // Fermer la connexion à la base de données
    mysqli_close($con);
    ?>


<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script> 
<script>
        const datepicker = new Datepicker(document.querySelector('#datepicker'), {
            autohide: true,
            format: 'yyyy-mm-dd',
            startDate: new Date(),
        });
    </script>

</body>
</html>
