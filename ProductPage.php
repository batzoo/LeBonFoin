<!DOCTYPE html>
<html>
<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '');
?>

<?php 
if (isset($_GET['productid'])){
    $productid= $_GET['productid'];
} else {
    include 'produits.php';
    die;
} 
$verif=FALSE;
$verifreq=$bdd->query('SELECT id FROM products');
while($donnees=$verifreq->fetch()){
	if($productid==$donnees['id']){
		$verif=TRUE;
	}
} 

if($verif==TRUE):
	$reponse0 = $bdd->prepare('SELECT name,description,unit_price FROM products WHERE id=:id');
$reponse0->execute(array('id' => $productid ));
$donnees = $reponse0->fetch();
$productname=$donnees['name'];
$productdesc=$donnees['description'];
$productprice=$donnees['unit_price'];

endif
?>
<!--HEAD SECTION-->
<head>
    <title>LeBonFoin.fr</title> 
    <link rel="stylesheet" href="css/ProductPage.css" />
    <link rel="stylesheet" href="css/Header.css" />
    <?php include "header.php";?>
</head>

<!--BODY SECTION-->
<body>
	<section id="conteneur">
		<div id="element">
			<img src="Images/<?php echo $productname ?>.jpg" width="210">
			<p>
				<?php echo ($productdesc); ?>
				<br/>
				<?php echo "Prix : ", $productprice," €";?>
			</p>
		</div>
	</section>
	
    <?php include "footer.php";?>

</body>
</html>
