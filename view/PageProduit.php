<!DOCTYPE html>
<html>



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
		<div class=Formulaire>
    		<form method="post">

        		<label for="Quantity">Quantité (en kg) :</label>

        		<input type="number" name="quantity" /><br />
        		
        		<input type='submit' value="Ajouter">

    		</form>
    		<?php
    			if( isset( $_SESSION )){
					if( isset($_POST['quantity']) ){
						if($_POST['quantity']<=0){
							echo"Quantité invalide";
						}
					    else{
					     	$order_cart_id_ = $bdd->prepare("SELECT id FROM orders WHERE user_id=:usrid AND type='CART' ");
					     	$order_cart_id_ -> execute(array('usrid'=>$_SESSION['id']));
					     	if($data = $order_cart_id_ -> fetch()){
					     		echo $data;
					     		$order_cart_id = $data[0];
					     	}

					     	echo $order_cart_id;

					     	$write=$bdd->prepare('  INSERT INTO order_products(order_id, product_id, quantity, unit_price) VALUES (:orid,:prid,:qtt,:unpr)  ');
					     	$write -> execute(array(
					     		'orid' =>  $order_cart_id,
					     		'prid' => $productid ,
					     		'qtt' => $_POST['quantity'],
					     		'unpr' => $productprice 
					     	));
					    }
					    
					}
				}

    		?>

    	</div>
	</section>

</body>
</html>
