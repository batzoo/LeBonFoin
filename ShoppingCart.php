<<<<<<< HEAD
<?php
session_start();
?>
=======
>>>>>>> 3bc0ef20294434cbbb6b0a87dec65454de2172d1
<!DOCTYPE html>
<html>

<!--HEAD SECTION-->
<head>
    <title>LeBonFoin.fr</title> 
    <link rel="stylesheet" href="css/Produits.css" />
    <link rel="stylesheet" href="css/Header.css" />
</head>

<!--BODY SECTION-->
<body>
    <STYLE>A {text-decoration: none;} </STYLE>
    <section>

    
        <?php  
        $reponse=$bdd->query('SELECT id FROM orders WHERE status="CART"');
        $panierencours=$reponse->fetch(); 

        if($panierencours!=0){
            $NumOrder=$panierencours['id'];
        }
        else {
            echo 'test';
            //on va créer un nouveau panier car ils sont tous validés
            $request1='INSERT INTO `orders` ( `user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`) VALUES (:user_id,"ORDER","CART","0","5","6")';


            $modification=$bdd->prepare($request1);
            $modification->execute(array('user_id'=>3));/// TODO mettre lid user quand on gerera les users
            $NumOrder=$bdd->lastInsertId();
            var_dump($NumOrder);
        }
            ?>

            <div id="conteneur">

            <!--on regarde s'il y a une commande du produit 1-->
            <p><?php $reponse=$bdd->prepare('SELECT quantity,unit_price FROM order_products WHERE product_id="1"AND id=:recherche');
                    $reponse->execute(array(
                    'recherche'=>$NumOrder ));
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
            <p><?php $reponse=$bdd->prepare('SELECT quantity,unit_price FROM order_products WHERE product_id="2"AND id=:recherche');
                    $reponse->execute(array(
                    'recherche'=>$NumOrder ));
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
            <p><?php $reponse=$bdd->prepare('SELECT quantity,unit_price FROM order_products WHERE product_id="3"AND id=:recherche');
                    $reponse->execute(array(
                    'recherche'=>$NumOrder ));
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
                <br/><br/>
                <?php 
                echo $total,'€' ;?>
                <br/><br/>
                <?php 
                echo 'Si votre panier est complet, validez ici:';?>
                <br/>
                <form action='ShoppingCart.php' method='POST'>
                <input type='submit' name='validerCart'>
            </p>
            </div>

    </section>

        <!--validation d'un panier et creation d'un nouveau-->
        <?php 
        if (isset($_POST['validerCart'])==true):
            //on passe le panier precedent en mode BILLED (=validé)
            $requet='UPDATE orders set status="BILLED" WHERE id=:recherche';
            $modification=$bdd->prepare($requet);
            $modification->execute(array('recherche'=>$NumOrder));
            echo 'Panier validé';
            $_POST['validerCart']==false;
        endif
        ?>
    <!-- PB quand il cree une nouvelle commande, il valide directement avec la fonction toute en bas -->

    <?php include "footer.php";?>
</body>  
</html>
