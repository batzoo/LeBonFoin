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

        <!--on regarde s'il y a une commande du produit 1-->
        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE product_id="1"');
                 $prix1=$reponse->fetch(); 

        if($prix1['quantity']!=0):?>
            <div class="element">
                <p><img src="Images/foin.jpg" width="210"> </p>
                    <?php
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="1"');
                    $nom1=$reponse2->fetch();
                    $total=0;
                echo $nom1['name'];?>
                <br/>
                <?php
                echo 'Quantité : ',$prix1['quantity'],' Prix unitaire: ',$prix1['unit_price'],' €';?>
                <br/>
                </p>
            </div>
        <?php endif?>

        <!--on regarde s'il y a une commande du produit 2-->
        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE product_id="2"');
                 $prix2=$reponse->fetch(); 

        if($prix2['quantity']!=0):?>
            <div class="element">
                <p><img src="Images/Moisonneuse.jpg"width="250"></p>
                    <?php 
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="2"');
                    $nom2=$reponse2->fetch();
                echo $nom2['name']; ?>
                <br/>
                <?php echo 'Quantité: ',$prix2['quantity'],' Prix unitaire: ',$prix2['unit_price'],' €';?>
                <br/>
                </p>
            </div>
        <?php endif ?>
         
         <!--on regarde s'il y a une commande du produit 3-->    
        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE product_id="3"');
        $prix3=$reponse->fetch(); 

        if($prix3['quantity']!=0):?>
            <div class="element">
                <p><img  src="Images/Mangeoire.jpg" width="210"></p>
                <?php 
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="3"');
                    $nom3=$reponse2->fetch();
                echo $nom3['name']; ?>
                <br/>
                <?php echo 'Quantité: ',$prix3['quantity'],' Prix unitaire: ',$prix3['unit_price'],' €';?>
                <br/>
                </p>
            </div>
        <?php endif ?>
             
        <!--calcul du cout total du panier-->
        <div class="element"><p>
            <?php 
            $total = $n=$prix1['quantity']*$prix1['unit_price']+$prix2['quantity']*$prix2['unit_price']+$prix3['quantity']*$prix3['unit_price'];
            echo 'COUT TOTAL: ';?>
            <br/>
            <?php 
            echo $total,'€' ;?>
        </p>
        </div>
     
    </section>
    <?php include "footer.php";?>
</body>  
</html>
