<html>

<!--BODY SECTION-->
<body>
    <STYLE> {text-decoration: none;} </STYLE>
    <section>
        <div id="conteneur">
        <?php
        if( !empty($_SESSION['pseudo']) ){
            $order_cart_id_ = $bdd->prepare("SELECT id FROM orders WHERE user_id=:usrid AND type='CART' ");
            $order_cart_id_ -> bindParam('usrid',$_SESSION['id']);
            $data = $order_cart_id_ ->fetch();                             
            $order_cart_id = $data[0];
            echo $order_cart_id;                          
                      }  ?>

        <!--on regarde s'il y a une commande du produit 1-->
        <p><?php $reponse=$bdd->prepare('SELECT quantity,unit_price, id FROM order_products WHERE order_id=:orderid');
            $reponse->bindParam('orderid',$order_cart_id);
            $reponse -> execute();
            while($prix1 = $reponse->fetch()){

        ?>

       <!-- if($prix1['quantity']!=0):?>-->
                <div class="element">
                <p> <img id="cart" src="Images/images_produit/<?php echo $donnees['name']?>.jpg">
                    <!--<img id="cart" src="Images/foin_prairie.jpg" width="210"> </p>-->
                <div class="recapCommande">
                    <?php
                    $reponse2=$bdd->query('SELECT name FROM products WHERE id=:ids');
                    $reponse2 -> execute(array('ids'=>$prix1['id']));
                    $nom1 = $reponse2->fetch();
                    $total= $n=$total+$prix1['quantity']*$prix1['unit_price'];
                echo $nom1['name'];?>
                </div>
                <br/>
                <div class="recapCommande">
                <?php            
                echo 'Quantité : ',$prix1['quantity'],' Prix unitaire: ',$prix1['unit_price'],' €';?>
                </div>
                <br/>
                </p>
            </div>
    <?php          
    }?>


        <!--calcul du cout total du panier-->
        <div class="LastElement">
            <div class="prixCommande">
            <p>
           
          <!--  $total = $n=$prix1['quantity']*$prix1['unit_price']+$prix2['quantity']*$prix2['unit_price']+$prix3['quantity']*$prix3['unit_price']+$prix4['quantity']*$prix4['unit_price']+$prix5['quantity']*$prix5['unit_price']+$prix6['quantity']*$prix6['unit_price'];-->
             <?php 
            echo 'COUT TOTAL: ';?>
            <br/>
             <?php 
           // echo $total,'€' ;?>
        </p>
        </div>
        </div>
    </div>
     
    </section>
</body>  
</html>