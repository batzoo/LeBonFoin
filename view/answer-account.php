<body>
     
    <section>
       <div href="main.html">
            <center>
        	<img id="welcomeMainImage" src="Images/login.png">
            </center>
        </div>
    </section>

    <section>

<?php

    if($_POST["mdp1"]==$_POST["mdp2"]){ 
      $reponse=$bdd->prepare('SELECT username FROM users WHERE username=:recherche1');
      $reponse->execute(array(
      'recherche1'=>$_POST["pseudo"]
      ));
      $nom=$reponse->fetch();
        if ($nom[0] == $_POST["pseudo"]){
          echo ("Vous avez déja un compte");
        }
        else{
          $write=$bdd->prepare('INSERT INTO users(username, email, password) VALUES (:pseudo, :email, :mdp)');
          $write->execute(array(
          'pseudo' => $_POST["pseudo"],
          'mdp' => $_POST["mdp1"],
          'email' => $_POST["email"]));

          $user_id_ = $bdd->prepare('SELECT id FROM users WHERE username=:usrnm AND password=:pswrd ');
          $user_id_ -> execute(array(
            'usrnm' => $_SESSION["pseudo"],
            'pswrd' => $_SESSION["mdp"]
          ));
          if($data = $user_id_ -> fetch()){
            $user_id = $data[0];
          }

          

          $write = $bdd -> prepare ('INSERT INTO orders(user_id,type,status,amount,billing_adress_id,delivery_adress_id) VALUES (:usrid,"CART","CART",0,NULL,NULL)');
          $write -> execute(array(
            'usrid' => $user_id
          ));

          echo "<p>Votre compte a bien été créé, " . $_POST["pseudo"] . "</p>" ;
        }
    }
    else{
        echo "<p>Desole mais vos deux mot de passe sont différents </p>";
    }
    
?>
    </section>
</body>
