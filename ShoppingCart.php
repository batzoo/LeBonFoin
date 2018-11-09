<!DOCTYPE html>
<html>

<!--HEAD SECTION-->
<head>
    <title>LeBonFoin.fr</title> 
    <link rel="stylesheet" href="css/Produits.css" />
</head>

<!--BODY SECTION-->
<body>
     <STYLE>A {text-decoration: none;} </STYLE>
    <section>
        <div id="conteneur">

        <!--on regarde s'il y a une commande du produit 1-->
        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price, id FROM order_products WHERE product_id="1"');
                 $prix1=$reponse->fetch(); 

        if($prix1['quantity']!=0):?>
        		<div class="element">
                <p><img id="cart" src="Images/foin_prairie.jpg" width="210"> </p>
                <div class="recapCommande">
                    <?php
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="1"');
                    $nom1=$reponse2->fetch();
                    $total=0;
                echo $nom1['name'];?>
            	</div>
                <br/>
                <div class="recapCommande">
                <?php
                $idx=$prix1['id'];                
                echo 'Quantité : ',$prix1['quantity'],' Prix unitaire: ',$prix1['unit_price'],' €';?>
                <form action='index.php?page=deleteOrder' method='POST'>
                	 <input hidden name='delete' value = '".$prix1['id']."'/>
                	<label>    </label><input type="submit" value="Supprimer">
                </div>
                <br/>
                </p>
            </div>
        <?php endif?>

        <!--on regarde s'il y a une commande du produit 2-->
        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE product_id="2"');
                 $prix2=$reponse->fetch(); 

        if($prix2['quantity']!=0):?>
        		<div class="element">
                <p><img id="cart" src="Images/foin_prairie.jpg" width="210"></p>
                <div class="recapCommande">
                    <?php 
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="2"');
                    $nom2=$reponse2->fetch();
                echo $nom2['name']; ?>
                </div>
                <br/>
                 <div class="recapCommande">
                <?php echo 'Quantité: ',$prix2['quantity'],' Prix unitaire: ',$prix2['unit_price'],' €';?>
                </div>
                <br/>
                </p>
            </div>
        <?php endif ?>
         
         <!--on regarde s'il y a une commande du produit 3-->    

        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE product_id="3"');
        $prix3=$reponse->fetch(); 

        if($prix3['quantity']!=0):?>
            <div class="element">
                <p><img id="cart" src="Images/foin_prairie.jpg" width="210"></p>
                <div class="recapCommande">
                <?php 
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="3"');
                    $nom3=$reponse2->fetch();
                echo $nom3['name']; ?>
                <br/>
                <div class="recapCommande">
                <?php echo 'Quantité: ',$prix3['quantity'],' Prix unitaire: ',$prix3['unit_price'],' €';?>
                </div>
                <br/>
                </p>
            </div>
        <?php endif ?>
         
        <!--on regarde s'il y a une commande du produit 4-->    

        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE product_id="4"');
        $prix4=$reponse->fetch(); 

        if($prix4['quantity']!=0):?>
            <div class="element">
                <p><img id="cart" src="Images/Mangeoire.jpg" width="210"></p>
                <div class="recapCommande">
                <?php 
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="4"');
                    $nom4=$reponse2->fetch();
                echo $nom4['name']; ?>
                <br/>
                <div class="recapCommande">
                <?php echo 'Quantité: ',$prix4['quantity'],' Prix unitaire: ',$prix4['unit_price'],' €';?>
                </div>
                <br/>
                </p>
            </div>
        <?php endif ?>

        <!--on regarde s'il y a une commande du produit 5-->    

        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE product_id="5"');
        $prix5=$reponse->fetch(); 

        if($prix5['quantity']!=0):?>
            <div class="element">
                <p><img id="cart" src="Images/Mangeoire.jpg" width="210"></p>
                <div class="recapCommande">
                <?php 
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="5"');
                    $nom5=$reponse2->fetch();
                echo $nom4['name']; ?>
                <br/>
                <div class="recapCommande">
                <?php echo 'Quantité: ',$prix5['quantity'],' Prix unitaire: ',$prix5['unit_price'],' €';?>
                </div>
                <br/>
                </p>
            </div>
        <?php endif ?>

        <!--on regarde s'il y a une commande du produit 6-->    

        <p><?php $reponse=$bdd->query('SELECT quantity,unit_price FROM order_products WHERE product_id="6"');
        $prix6=$reponse->fetch(); 

        if($prix6['quantity']!=0):?>
            <div class="element">
                <p><img id="cart" src="Images/Mangeoire.jpg" width="210"></p>
                <div class="recapCommande">
                <?php 
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id="6"');
                    $nom6=$reponse2->fetch();
                echo $nom6['name']; ?>
                <br/>
                <div class="recapCommande">
                <?php echo 'Quantité: ',$prix6['quantity'],' Prix unitaire: ',$prix6['unit_price'],' €';?>
                </div>
                <br/>
                </p>
            </div>
        <?php endif ?>

        <!--calcul du cout total du panier-->
        <div class="LastElement">
        	<div class="prixCommande">
        	<p>
            <?php 
            $total = $n=$prix1['quantity']*$prix1['unit_price']+$prix2['quantity']*$prix2['unit_price']+$prix3['quantity']*$prix3['unit_price']+$prix4['quantity']*$prix4['unit_price']+$prix5['quantity']*$prix5['unit_price']+$prix6['quantity']*$prix6['unit_price'];
            echo 'COUT TOTAL: ';?>
            <br/>
            <?php 
            echo $total,'€' ;?>
        </p>
        </div>
        </div>
    </div>
     
    </section>
    <?php include "footer.php";?>
</body>  
</html>
