<body><?php include "header.php";?>
   <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '') ;?>
 <body>
 	<div><?php
 		$recherche = $_POST["recherche"];
		$reponse=$bdd->query('SELECT name,unit_price,description FROM products WHERE name="$recherche"');
		//IL Y A TJRS UN PROBLEME DANS LA RECHERCHE
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