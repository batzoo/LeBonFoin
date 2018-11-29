
<?php 
	
	$billed = "BILLED";
	$reponse2 = $bdd->prepare('UPDATE orders SET status=:status WHERE id=:id1');
	$reponse2->execute(array(
		'id1'=>$_SESSION['idcart'],
		'status'=>$billed
		));

	$createur = $bdd->prepare('INSERT INTO orders(user_id,type,status,amount,billing_adress_id,delivery_adress_id) VALUES (:usrid,"CART","CART",0,NULL,NULL)');
	$createur -> execute(array(
            'usrid' => $_SESSION['id']
          ));


	$cart = "CART";
	$order_cart_id_ = $bdd->prepare('SELECT id FROM orders WHERE user_id=:usrid AND status=:status');
	$order_cart_id_ -> execute(array(
		'usrid'=>$_SESSION['id'],
		'status'=>$cart
		));
	$data = $order_cart_id_ -> fetch();
	$order_cart_id = $data[0];

	$_SESSION['idcart'] = $order_cart_id;


	header('Location: index.php?page=panier');
  	exit();
?>