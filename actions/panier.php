<?php 
if(isset($_POST['supprimer'])){
	if(isset($_GET['productid'])){
		$suppr_ = $bdd->prepare('DELETE FROM order_products WHERE product_id=:productid');
		$suppr_ -> execute(array(
			'productid'=>$_GET['productid']
			));
		}

header('Location: index.php?page=panier');}
?>