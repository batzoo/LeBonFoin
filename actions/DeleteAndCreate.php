
<?php 

	$id=$_SESSION['ID'];

	$reponse = $bdd->prepare('SELECT id FROM orders WHERE user_id=:id AND status="CART"');
			$reponse->bindParam(':id',$id);
			$reponse->execute();
			$cartid = $reponse->fetch();

	$reponse2 = $bdd->prepare('UPDATE orders SET status="BILLED" WHERE id=:id1 AND user_id=:id2');
			$reponse2->bindParam(':id1',$cartid);
			$reponse2->bindParam(':id2',$id);
			$reponse->execute();
			echo 'billed';


	$createur = $bdd->prepare('INSERT INTO orders(user_id,type,status,amount,billing_adress_id,delivery_adress_id) VALUES (:usrid,CART,CART,0,NULL,NULL)');
	$createur -> execute(array(
            'usrid' => $id
          ));
			echo 'new';


?>