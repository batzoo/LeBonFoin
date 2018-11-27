<body>
     
    <section>
       <div href="main.html">
            <center>
        	<img id="welcomeMainImage" src="Images/login.png" width="400" length="400">
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

          echo "<p>Votre compte a bien été créé, " . $_POST["pseudo"] . "</p>" ;
        }
    }
    else{
        echo "<p>Desole mais vos deux mot de passe sont différents </p>";
    }
    
?>
    </section>
</body>
