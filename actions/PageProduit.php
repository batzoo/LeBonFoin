<!-- ACTION POUR AJOUTER DANS LE PANIER -->
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
		
    	else{
			echo 'Vous n\'etes pas connecté !';
		}?>
		