<!DOCTYPE html>
<html>

<!--BODY SECTION-->
<body>
     <STYLE>A {text-decoration: none;} </STYLE>
    <section>
        <div id="conteneur">

        
        <?php
        $_SESSION['currentpage']="panier";
        //Si on est connecté
        if( !empty($_SESSION['pseudo']) ){

            $prix_total = 0;

            $produits_panier_ = $bdd->prepare("SELECT product_id,quantity,unit_price FROM order_products WHERE order_id=:ordid");
            $produits_panier_ -> execute(array('ordid'=>$_SESSION['idcart']));

            //on parcours la liste des produits du panier
            while($data = $produits_panier_ -> fetch()){

                //on récupère le nom du produit(on a déja prix et qtt)
                $produit_ = $bdd -> prepare("SELECT name FROM products WHERE id=:prdid");
                $produit_ -> execute(array('prdid'=>$data['product_id']));
                $produit = $produit_ -> fetch();

                ?>
                <div class="element">
                    <img id="cart" src="Images/images_produit/<?php echo $produit[0]?>.png" width="210"> </p>
                    <div class="recapCommande">
                        <?php 
                        echo $produit[0];?>
                    </div>
                    <br/>
                    <div class="recapCommande">
                    <?php            
                    echo 'Quantité : ',$data['quantity'],' Prix unitaire: ',$data['unit_price'],' €';
                    $prix_total = $prix_total + ($data['quantity']*$data['unit_price']);
                    ?>
                    <form action="index.php?page=accueil" method="POST">
                    <input type='submit' name='deconnexion', value="Supprimer" ></form>
                    </div>
                    <br/>
                    </p>
                </div>
                <?php

            }
            ?>

            <!--calcul du cout total du panier-->
            <div class="LastElement">
            <div class="prixCommande">
            <p>
            <?php 
            echo 'COUT TOTAL: ';?>
            <br/>
            <?php 
            echo $prix_total,'€' ;?>

            <br/>
            <a href="index.php?page=DeleteAndCreate"><form><input type="button" value="Valider le panier" action='index.php?page=DeleteAndCreate'"/></form></a>
            
                
            </p>
            </div>
            </div>
        <?php
        }
        else{
            echo "Connectez-vous pour voir votre panier !";
        }

        ?>
        
        
    </div>
     
    </section>
</body>  
</html>
