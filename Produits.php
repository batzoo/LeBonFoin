<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/Produits.css" />

    
</head>
 <?php include "header.php";?>
<body>
     <STYLE>A {text-decoration: none;} </STYLE>
    <section>
        <div id="conteneur">
        <div class="element">
            <a href="foin.php">
            <p><img src="Images/foin.jpg" width="210"> </p>
            <p id="texte"><?php $reponse=$bdd->query('SELECT name FROM products WHERE id="1"');
                $nom=$reponse->fetch();
            echo($nom['name']);?>
            <br/>
            </p>
    	</a></div>
        	
         <div class="element">
            <p><img src="Images/Moisonneuse.jpg"width="250"></p>
            <p id="texte"><?php $reponse=$bdd->query('SELECT name,unit_price FROM products WHERE id="2"');
                $nom=$reponse->fetch();
            echo($nom['name']);?>
            <br/>
            <?php
            echo 'Prix : ', $nom['unit_price'], ' €';
            ?>
            <form>
            <input id="addbutton" type="button" name="add" onclick="">

            </form>


            </form>
        </p>
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
