<body>
 	<div><?php
 		$recherche = $_POST["recherche"];
		$reponse=$bdd->prepare('SELECT name,unit_price,description FROM products WHERE name=:recherche');
		$reponse->execute(array(
			'recherche'=>$recherche
		));
          		$nom=$reponse->fetch();
            echo($nom['name']);?>
            <br/>
            <?php
            echo 'Prix : ', $nom['unit_price'], ' €';?>
            <br/>
            <?php
            echo 'Description du produit:', $nom['description'];?>
            </p>
    	</a></div>

</body>