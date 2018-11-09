<head>
    <link rel="stylesheet" href="css/Produits.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="shortcut icon" href="images/logopetit.jpg">
    <link rel="stylesheet" href="css/connexion.css" />
    <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonfoin;charset=utf8', 'root', '') ;?>
</head>

<header>

<a id="headertitle" href="index.php?page=Acceuil">LeBonFoin.fr</a>	

<connexion><div class=connexion>
    <form action='index.php?page=checkUser' method='POST'>
        <label for="PseudoCo">Pseudo :</label><input type="text" name="pseudoConnexion" /><br />
        <label for="mdp3">Mot de passe :</label><input type="text" name="mdpConnexion" /><br />
        <label>    </label><input type='submit' >
    </form>
	</connexion> 

	  

	

		<nav>
			<div id="Menus">
			<div class="menuCategory"><a href="index.php?page=createAccount">Create Account</a> </div>
			<div class="menuCategory">
			    <a href="index.php?page=search">Search</a>
			</div>
			<div class="menuCategory">
				
		    	<span class="navtitle"><a href="index.php?page=produits2">Product</a></span>
		    	
			</div>
			<div class="menuCategory"><a href="index.php?page=panier">Panier</a> </div>

			<div class="menuCategory">
			    <a href="index.php?page=ContactUs">Contact us</a>
			</div>
		</div>
		</nav>
	</header>