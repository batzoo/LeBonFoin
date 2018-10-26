<?php
session_start()
?>
<!DOCTYPE html>
<html>

<!--HEAD SECTION-->
<head>
    <title>LeBonFoin.fr</title> 
    <link rel="stylesheet" href="css/Produits.css" />
    <link rel="stylesheet" href="css/Header.css" />
    <?php include "header.php";?>
</head>

<!--BODY SECTION-->
<body>
     <STYLE>A {text-decoration: none;} </STYLE>
    <section>
        <div id="conteneur">
        <div class="element">
            <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE id="2"');
            $reponse2=$bdd->query('SELECT name FROM products WHERE id="1"');
                $nom=$reponse->fetch();
                $nom1=$reponse2->fetch();
                $total=0;
            echo $nom1['name'],'      Quantité : ',$nom['quantity'],'      Prix : ',$nom['unit_price'],' €';?>
            <br/>
            </p>
        </div>
            
         <div class="element">
            <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE id="3"');
                $nom=$reponse->fetch();
            echo '      Quantité : ',$nom['quantity'],'      Prix : ',$nom['unit_price'],' €';?>
            <br/>
            </p>
        </p>
        </div>

             
        <div class="element">
           <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE id="4"');
                $nom=$reponse->fetch();
            echo '      Quantité : ',$nom['quantity'],'      Prix : ',$nom['unit_price'],' €';?>
            <br/>
            </p>
        </div>
        <div class="element"><p>TOTAL: 
        </p></div>
    </div> 
</section>
    <?php include "footer.php";?>
</body>  
</html>
