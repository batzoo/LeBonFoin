
<?php 

	$id=$_SESSION['id'];
	var_dump($id);

	$reponse = $bdd->prepare('SELECT id FROM orders WHERE user_id=:id AND status="CART"');
			$reponse->bindParam(':id',$id);
			$reponse->execute();
			$cartid = $reponse->fetch();

	var_dump($cartid[0]);
	$test = "BILLED";
	$reponse2 = $bdd->prepare('UPDATE orders SET status=:status WHERE id=:id1 AND user_id=:id2');
			$reponse2->bindParam(':id1',$cartid[0]);
			$reponse2->bindParam(':id2',$id);
			$reponse2->bindParam(':status',$test);

			$reponse2->execute();

	$createur = $bdd->prepare('INSERT INTO orders(user_id,type,status,amount,billing_adress_id,delivery_adress_id) VALUES (:usrid,"CART","CART",0,NULL,NULL)');
	$createur -> execute(array(
            'usrid' => $id
          ));


?>