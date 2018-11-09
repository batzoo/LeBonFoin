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
    include 'index.php?page=produits2';
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
    
</head>

<!--BODY SECTION-->
<body>
	<section id="conteneur">
		<div id="element">
			<img src="Images/images_produit/<?php echo $productname ?>.png" width="210">
			<p>
				<?php echo ($productdesc); ?>
				<br/>
				<?php echo "Prix : ", $productprice," €";
				echo("
					<form method='post' action='index.php?page=addtocart&productid=".$productid."'> 
					<input type='submit' name='submit' value='Add to cart' /></form>");?>
				</form>
			</p>
		</div>
		
	</section>

</body>
</html>
