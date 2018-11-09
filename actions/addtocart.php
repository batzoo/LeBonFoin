<?php
	
		$cart=TRUE;
		
			if($cart==TRUE){
				$productid=$_GET['productid'];
				$reponse2 = $bdd->prepare('SELECT amount FROM orders WHERE id=:id');
				$reponse2->bindParam(':id',$order_id);
				$reponse2->execute();
				$donnees = $reponse2->fetch();
				$amountprev=$donnees['amount'];
				$newamount=$amountprev;
				$req0 = $bdd->prepare('UPDATE orders SET amount = :newamount WHERE id=:id');
				$req0->execute(array('newamount' => $newamount, 'id'=> $order_id));

				$reponse3= $bdd->prepare('SELECT product_id FROM order_products WHERE order_id=:order_id');
				$reponse3->bindParam(':order_id',$order_id);
				$reponse3->execute();
				$newproduct=1;
				while($donnees=$reponse3->fetch()){
					if($donnees['product_id']==$productid){
						$newproduct=0;
					}		
				}					
				if($newproduct==1){
					
					$req = $bdd->prepare('INSERT INTO order_products(order_id,product_id,unit_price) VALUES(:order_id, :productid, :unit_price)');
					$req->execute(array('order_id'=>$order_id,'productid'=>$productid,'unit_price'=>$productprice));
					
				}

				else{
					
					$reponse4=$bdd->prepare('SELECT quantity FROM order_products WHERE order_id=:order_id AND product_id=:product_id');
					$reponse4->bindParam(':order_id',$order_id);
					$reponse4->bindParam(':product_id',$productid);
					$reponse4->execute();
					$donnees=$reponse4->fetch();
					$newquantity=$donnees['quantity']+$_POST['prodquantity'];
					$req1=$bdd->prepare('UPDATE order_products SET quantity = :quantity WHERE order_id=:order_id AND product_id=:product_id');
					$req1->execute(array('quantity' => $newquantity, 'order_id' => $order_id, 'product_id' => $productid));
				}
											
			}
			
			else{
				if($billid==$delid){
					$reponse2 = $bdd->prepare('SELECT human_name,address_one,address_two,postal_code,city,country FROM user_addresses WHERE id=:billid');
					$reponse2->bindParam(':billid',$billid);
					$reponse2->execute();
					$donnees=$reponse2->fetch();
					$name=$donnees['human_name'];
					$ad1=$donnees['address_one'];
					$ad2=$donnees['address_two'];
					$postal=$donnees['postal_code'];
					$city=$donnees['city'];
					$country=$donnees['country'];

					$req = $bdd->prepare('INSERT INTO order_addresses(human_name, address_one, address_two, postal_code,city,country) VALUES(:human_name, :address_one, :address_two, :postal_code, :city, :country)');
					$req->execute(array('human_name' => $name,'address_one' => $ad1,'address_two' => $ad2,'postal_code' => $postal,'city' => $city, 'country' => $country ));

					$stmt = $bdd->query("SELECT LAST_INSERT_ID()");
					$lastId = $stmt->fetchColumn();

					$req1 = $bdd->prepare('INSERT INTO orders(user_id, status, amount,billing_adress_id,delivery_adress_id) VALUES(:user_id, :status, :amount, :billing_adress_id, :delivery_adress_id)');
					$req1->execute(array('user_id' => $user_id,'status' => 'CART','amount' => $amount,'billing_adress_id' => $lastId,'delivery_adress_id' => $lastId));
					$stmt = $bdd->query("SELECT LAST_INSERT_ID()");
					$lastId = $stmt->fetchColumn();

				}
				else{
					$reponse2 = $bdd->prepare('SELECT human_name,address_one,address_two,postal_code,city,country FROM user_addresses WHERE id=:delid');
					$reponse2->bindParam(':delid',$delid);
					$reponse2->execute();
					$donnees=$reponse2->fetch();
					$name=$donnees['human_name'];
					$ad1=$donnees['address_one'];
					$ad2=$donnees['address_two'];
					$postal=$donnees['postal_code'];
					$city=$donnees['city'];
					$country=$donnees['country'];

					$req = $bdd->prepare('INSERT INTO order_addresses(human_name, address_one, address_two, postal_code,city,country) VALUES(:human_name, :address_one, :address_two, :postal_code, :city, :country)');

					$req->execute(array('human_name' => $name,'address_one' => $ad1,'address_two' => $ad2,'postal_code' => $postal,'city' => $city, 'country' => $country ));
					$stmt = $bdd->query("SELECT LAST_INSERT_ID()");
					$lastId = $stmt->fetchColumn();

					$reponse3 = $bdd->prepare('SELECT address_one,address_two,postal_code,city,country FROM user_adresses WHERE id=:billid');
					$reponse3->bindParam(':billid',$billid);
					$reponse3->execute();
					$donnees=$reponse3->fetch();
					$ad12=$donnees['address_one'];
					$ad22=$donnees['address_two'];
					$postal2=$donnees['postal_code'];
					$city2=$donnees['city'];
					$country2=$donnees['country'];

					$req1 = $bdd->prepare('INSERT INTO order_addresses(human_name, address_one, address_two, postal_code,city,country) VALUES(:human_name, :address_one, :address_two, :postal_code, :city, :country)');

					$req1->execute(array('human_name' => $name,'address_one' => $ad12,'address_two' => $ad22,'postal_code' => $postal2,'city' => $city2, 'country' => $country2 ));


					$req2 = $bdd->prepare('INSERT INTO orders(user_id, status, amount,billing_adress_id,delivery_adress_id) VALUES(:user_id, :status, :amount, :billing_adress_id, :delivery_adress_id)');

					$req2->execute(array('user_id' => $user_id,'status' => 'CART','amount' => $amount,'billing_adress_id' => $lastId+1,'delivery_adress_id' => $lastId));
					$stmt = $bdd->query("SELECT LAST_INSERT_ID()");
					$lastId = $stmt->fetchColumn();
				}
				$req3=$bdd->prepare('INSERT INTO order_products(order_id,product_id,quantity,unit_price) VALUES(:order_id, :productid, :quantity, :unit_price)');
				$req3->execute(array('order_id'=>$lastId,'productid'=>$productid,'quantity'=>$_POST['prodquantity'],'unit_price'=>$productprice));
			} ?>
			
		