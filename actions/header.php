<?php
    if (empty($_POST["pseudoConnexion"])==FALSE){

        //on cherche le compte dans la bdd
        $request = $bdd -> prepare('SELECT username FROM users WHERE username=:usr AND password=:pwd');
        $request -> execute(array('usr' => $_POST["pseudoConnexion"], 'pwd' => $_POST["mdpConnexion"]));
        $data = $request -> fetch();
        $request = $data[0];

        //si le compte a été trouvé
        if(isset($request)){

          $_SESSION['pseudo'] = $_POST["pseudoConnexion"];
          $_SESSION['mdp'] = $_POST["mdpConnexion"];

          $user_id_ = $bdd->prepare('SELECT id FROM users WHERE username=:usrnm AND password=:pswrd ');
          $user_id_ -> execute(array(
            'usrnm' => $_SESSION["pseudo"],
            'pswrd' => $_SESSION["mdp"]
          ));

          $data = $user_id_ -> fetch();
          $user_id = $data[0];

          $_SESSION['id'] = $user_id;

          //on regarde si l'user a un panier en cours
          $order_cart_id_ = $bdd->prepare("SELECT id FROM orders WHERE user_id=:usrid AND status='CART' ");
          $order_cart_id_ -> execute(array('usrid'=>$_SESSION['id']));
          $data = $order_cart_id_ -> fetch();
          $order_cart_id = $data[0];

          //si il n'a pas de panier on lui en crée un
          if(!isset($order_cart_id)){
            $write = $bdd -> prepare ('INSERT INTO orders(user_id,type,status,amount,billing_adress_id,delivery_adress_id) VALUES (:usrid,"CART","CART",0,NULL,NULL)');
            $write -> execute(array(
              'usrid' => $_SESSION['id']
            ));

            $order_cart_id_ = $bdd->prepare("SELECT id FROM orders WHERE user_id=:usrid AND type='CART' ");
            $order_cart_id_ -> execute(array('usrid'=>$_SESSION['id']));
            $data = $order_cart_id_ -> fetch();
            $order_cart_id = $data[0];
            $_SESSION['idcart'] = $order_cart_id;

          }
          else{
            $_SESSION['idcart'] = $order_cart_id;
          }



        }
        else{
        }
    }
    header('Location: index.php?page=accueil');
    exit();
?>