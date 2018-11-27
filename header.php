<head>
	<link rel ="stylesheet" href="css/format.css" />
    <link rel="stylesheet" href="css/Produits.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="shortcut icon" href="images/logopetit.jpg">
    <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonfoin;charset=utf8', 'root', '') ;?>
</head>

<header>
<div id="Menus">
<!--<div class="title">  </div>-->
<div class="connect"><a id="headertitle" href="index.php?page=accueil">LeBonFoin.fr</a></div>	

	<?php 
	if(empty($_SESSION['pseudo'])==true){ ?>
		<div class="connect">
		</br>
		<form action='index.php?page=checkUser' method='POST'>
			<label for="PseudoCo">Pseudo :</label><input type="text" name="pseudoConnexion" /><br />
			<label for="mdp3">Mot de passe :</label><input type="text" name="mdpConnexion" /><br />
			<label>    </label><input type='submit' >
		</form>
		</div>		
<?php }
	else { ?>		
		<div class="connect">
		</br>
		<?php echo 'Vous êtes connecté, ', $_SESSION['pseudo'];?>
		</br>
		</br>
		<form action="index.php?page=accueil" method="POST">
        <input type='submit' name='deconnexion', value="Deconnexion" ></form>
	</div>
</div>

	<?php }
		if (isset($_POST['deconnexion'])){
			session_unset(); 
		}
	?>


</div>
		<nav>
			<div id="Menus">
			<?php if (!isset($_SESSION["pseudo"])){
				echo("<div class='menuCategory'><a href='index.php?page=createAccount'>Create Account</a> </div>");}
				?>
			<div class="menuCategory">
			    <a href="index.php?page=search">Search</a>
			</div>
			<div class="menuCategory">
				
		    	<span class="navtitle"><a href="index.php?page=produits2">Product</a></span>
		    	
			</div>
			<div class="menuCategory"><a href="index.php?page=panier">Panier</a> </div>

			<div class="menuCategory">
			    <a href="index.php?page=contact">Contact us</a>
			</div>
		</div>
		</nav>
	</header>

