<!DOCTYPE html>
<html>



<?php 
if (isset($_GET['productid'])){
    $productid= $_GET['productid'];
} else {
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
<body>
	<section id="conteneur">
		<div id="element">
			<img src="Images/images_produit/<?php echo $productname ?>.png" width="210">
			<h4> <?php echo ($productname); ?> </h4>
			<p>
				
				<?php echo ($productdesc); ?>
				<br/>
				<?php echo "Prix : ", $productprice," €";?>
			</p>
		</div>

		<?php 
		if( !empty($_SESSION['pseudo']) ){
		?>
		<div class=Formulaire>
    		<form action="index.php?page=PageProduit&productid=<?php echo $_GET["productid"]?>" method="post">

        		<label for="Quantity">Quantité (en kg) :</label>

        		<input type="number" name="quantity" /><br />
        		
        		<input type='submit' value="Ajouter">

    		</form>
    	<?php	
		}
		if(!isset($_SESSION['pseudo'])){
			echo 'Vous n\'etes pas connecté !';
		 }?>
		</div>
	</section>

</body>
</html>
