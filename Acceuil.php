<?php
session_start()
?>
<body>
	<?php include "header.php";?>
	<link rel="stylesheet" href="css/Produits.css" />
	<section>
			<center>
        	<img id="welcomeMainImage" src="Images/logo.jpg" width='350' height='250'>
        	</center>
        </div>
    </section>
    <section>
<?php 
$pseudoCo=$_SESSION['pseudo'];
?>

<div class='titre'>
    <h1>'Bonjour <?php echo ($pseudoCo) ?>' </h1></div>
    <h1>'Bienvenue sur LeBonFoin.fr'</h1></div>
<div class='soustitre'>
    <h1>Fournisseur officiel des agriculteurs des Haut-de-France depuis 1892 !</h1>
    <h1>Bonne navigation ! :)</h1>
</div>
    </section>
    <?php include "footer.php";?>
</body>
