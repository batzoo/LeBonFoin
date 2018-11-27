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

		<?php 
		if( !empty($_SESSION['pseudo']) ){
		?>
		<div class=Formulaire>
    		<form method="post">

        		<label for="Quantity">Quantité (en kg) :</label>

        		<input type="number" name="quantity" /><br />
        		
        		<input type='submit' value="Ajouter">

    		</form>
    		<?php
			
				if( isset($_POST['quantity']) ){
					if($_POST['quantity']<=0){
						echo"Quantité invalide";
					}
				    else{
				     	$product_qtt_ = $bdd->prepare("SELECT quantity FROM order_products WHERE product_id=:prdid AND order_id=:ordid ");
				     	$product_qtt_ -> execute(array('prdid'=>$productid,'ordid'=>$_SESSION['idcart']));

				     	$data = $product_qtt_ -> fetch();
				     	$product_qtt = $data[0];
				     	
			     		if(isset($product_qtt)){
			     			$totalqtt = $product_qtt + $_POST['quantity'];
			     			//UPDATE MyGuests SET lastname='Doe' WHERE id=2
			     			//$reponse = $bdd->query('SELECT name,description,unit_price,id FROM products');
			     			$update = $bdd->prepare('UPDATE order_products SET quantity=:qtt WHERE product_id=:prdid AND order_id=:ordid');
			     			$update -> execute(array('qtt'=>$totalqtt,'prdid'=>$productid,'ordid'=>$_SESSION['idcart']));
			     		}
			     		else{
			     			$write=$bdd->prepare('  INSERT INTO order_products(order_id, product_id, quantity, unit_price) VALUES (:orid,:prid,:qtt,:unpr)  ');
					     	$write -> execute(array(
					     		'orid' =>  $_SESSION['idcart'],
					     		'prid' => $productid ,
					     		'qtt' => $_POST['quantity'],
					     		'unpr' => $productprice 
					     	));
			     		}	
				    }  
				}
		}
    	else{
			echo 'Vous n\'etes pas connecté !';
		}?>
		</div>
	</section>

</body>
</html>
