<head>
    <link rel="stylesheet" href="css/Produits.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="shortcut icon" href="images/logopetit.jpg">
    <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonfoin;charset=utf8', 'root', '') ;?>
</head>

<header><a id="headertitle" href="index.php?page=Acceuil">LeBonFoin.fr</a>

		<nav>
			<div id="Menus">
			<div class="menuCategory"><a href="index.php?page=CreateAccountPage">Create Account</a> </div>
			<div class="menuCategory">
			    <a href="index.php?page=Search">Search</a>
			</div>
			<div class="menuCategory">
				
		    	<span class="navtitle"><a href="index.php?page=Produits">Product</a></span>
		    	
			</div>
			<div class="menuCategory"><a href="index.php?page=ShoppingCart">Panier</a> </div>

			<div class="menuCategory">
			    <a href="index.php?page=ContactUs">Contact us</a>
			</div>
		</div>
		</nav>
	</header>