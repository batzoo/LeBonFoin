
<?php 

	$reponse2 = $bdd->prepare('UPDATE orders SET status=:status WHERE id=:id1 AND user_id=:id2');
			$reponse2->bindParam(':id1',$_SESSION['idcart']);
			$reponse2->bindParam(':id2',$_SESSION['id']);
			$reponse2->bindParam(':status',"BILLED");

			$reponse2->execute();

	$createur = $bdd->prepare('INSERT INTO orders(user_id,type,status,amount,billing_adress_id,delivery_adress_id) VALUES (:usrid,"CART","CART",0,NULL,NULL)');
	$createur -> execute(array(
            'usrid' => $id
          ));


?>