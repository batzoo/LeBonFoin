<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/Produits.css" />
   <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '') ;?>
</head>
 <?php include "header.php";?>
<body>
    <section>
        <div id="conteneur">
        <div class="element">
            <p><img src="Images/noir.jpg" width="200"> </p>
            <p><?php $reponse=$bdd->query('SELECT name FROM products WHERE id="1"');
                $nom=$reponse->fetch();
            echo($nom['name']);
            ?></p>
    	</div>
        	
         <div class="element">
            <p><img src="Images/noir.jpg"width="200"></p>
            <p><?php $reponse=$bdd->query('SELECT name FROM products WHERE id="2"');
                $nom=$reponse->fetch();
            echo($nom['name']);
            ?></p>
            <p>Prix : </p>

        </div>

    		 
    	<div class="element">
            <p><img  src="Images/noir.jpg" width="200"></p>
            <p>Mangoire incrustée de diamants</p>
        </div>
    </div> 
</section>
    <?php include "footer.php";?>
</body>  
</html>
