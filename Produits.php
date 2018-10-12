<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/Produits.css" />

   <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '') ;?>
</head>
 <?php include "header.php";?>
<body>
     <STYLE>A {text-decoration: none;} </STYLE>
    <section>
        <div id="conteneur">
        <div class="element">
            <a href="foin.php">
            <p><img src="Images/foin.jpg" width="200"> </p>
            <p id="texte"><?php $reponse=$bdd->query('SELECT name,unit_price FROM products WHERE id="1"');
                $nom=$reponse->fetch();
            echo($nom['name']);?>
            <br/>
            <?php
            echo 'Prix : ', $nom['unit_price'], ' €/kg';
            ?></p>
    	</a></div>
        	
         <div class="element">
            <p><img src="Images/Moisonneuse.jpg"width="200"></p>
            <p id="texte"><?php $reponse=$bdd->query('SELECT name,unit_price FROM products WHERE id="2"');
                $nom=$reponse->fetch();
            echo($nom['name']);?>
            <br/>
            <?php
            echo 'Prix : ', $nom['unit_price'], ' €';
            ?></p>
        </div>

    		 
    	<div class="element">
            <p><img  src="Images/Mangeoire.jpg" width="200"></p>
            <p id="texte"><?php $reponse=$bdd->query('SELECT name,unit_price FROM products WHERE id="3"');
                $nom=$reponse->fetch();
            echo($nom['name']);?>
            <br/>
            <?php
            echo 'Prix : ', $nom['unit_price'], ' €';
            ?></p>
        </div>
    </div> 
</section>
    <?php include "footer.php";?>
</body>  
</html>
