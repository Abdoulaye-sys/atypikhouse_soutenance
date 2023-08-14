<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>  
  <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="dashboard.php" class="logo">
						<img src="assets/img/rsadmin1.png" alt="Logo">
					</a>
					<a href="dashboard.php" class="logo logo-small">
						<img src="assets/img/rsadmin1.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				

				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					
					<!-- User Menu -->
					<!-- <h4 style="color:white;margin-top:13px;text-transform:capitalize;"><?php echo $_SESSION['auser'];?></h4> -->
					<li class="nav-item dropdown app-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.png" width="31" alt="Ryan Taylor"></span>
						</a>
						
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="assets/img/profiles/avatar-01.png" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php echo $_SESSION['auser'];?></h6>
									<p class="text-muted mb-0">Administrateur</p>
								</div>
							</div>
							<a class="dropdown-item" href="profile.php">Profil</a>
							<a class="dropdown-item" href="logout.php">Deconnexion</a>
						</div>
					</li>

					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			
			<!-- header --->
			
			
			
						<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Principal</span>
							</li>
							<li> 
								<a href="dashboard.php"><i class="fe fe-home"></i> <span>Tableau de bord</span></a>
							</li>
							
							<!-- <li class="menu-title"> 
								<span>Authentication</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="index.php"> Login </a></li>
									<li><a href="register.php"> Register </a></li>
									
								</ul>
							</li> -->
							<li class="menu-title"> 
								<span>Tous les Utilisateurs</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Tous les Utilisateurs </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="adminlist.php"> Administrateur </a></li>
									<li><a href="userlist.php"> utilisateur </a></li>
									<li><a href="useragent.php"> Agent </a></li>
									<li><a href="userbuilder.php"> Constructeur </a></li>
								</ul>
							</li>

							<li class="menu-title"> 
								<span>Pays & Ville</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-location"></i> <span>Pays & Ville</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="stateadd.php"> Pays </a></li>
									<li><a href="cityadd.php"> Ville </a></li>
								</ul>
							</li>
						
							<li class="menu-title"> 
								<span>gestion des biens</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-map"></i> <span> propriété</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="propertyadd.php"> Ajouter une propriété</a></li>
									<li><a href="propertyview.php"> Voir la propriété </a></li>
									
								</ul>
							</li>
							
							
							
							<li class="menu-title"> 
								<span>requête</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-comment"></i> <span> Personne, commentaires </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="contactview.php"> contact </a></li>
									<li><a href="feedbackview.php"> commentaire </a></li>
								</ul>
							</li>
							<li class="menu-title"> 
								<span>A propos</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-browser"></i> <span> page À propos </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="aboutadd.php"> Ajouter du contenu à propos </a></li>
									<li><a href="aboutview.php"> Voir le contenu à propos </a></li>
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Site Web</span>
							</li>
							<li> 
								<a href="../index.php"><i class="fa fa-globe" aria-hidden="true"></i> <span>Revenir vers le site</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
