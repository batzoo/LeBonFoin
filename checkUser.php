

   <link rel ="stylesheet" href="css/format.css" />
    <link rel ="stylesheet" href="css/main.css" />
   <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '') ;?>
 <body>
 
	<div class='titre'>
    <h1>Connexion</h1></div>

   <div class=Formulaire>
    <form action='index.php?page' method='POST'>
        <label for="PseudoCo">Pseudo :</label><input type="text" name="pseudoConnexion" /><br />
        <label for="mdp3">Mot de passe :</label><input type="text" name="mdpConnexion" /><br />
        <label>    </label><input type='submit' >
    </form>
    <?php
  if (empty($_POST["pseudoConnexion"])==FALSE):{
    $_SESSION['pseudo']=$_POST["pseudoConnexion"]; 
    $_SESSION['mdp']=$_POST['mdpConnexion'];
    $controlUser = $_SESSION['pseudo'];
    $controlMdp = $_SESSION['mdp'];

    $reponse=$bdd->prepare('SELECT username FROM users WHERE username=:recherche1 and password=:recherche2');
        $reponse->execute(array(
          'recherche1'=>$controlUser,
          'recherche2'=>$controlMdp
        ));
                  $nom=$reponse->fetch();
                ?>

            <?php if ($nom == null): 
              echo('erreur, pseudo invalide');
            else:
              echo('connexion validée, cliquez ci-dessous');
              ?>
              <form action="index.php?page=Acceuil" method="POST">
                    <label>    </label><input type='submit' >
          </form> 
           <?php endif
           ;}
  endif        
//TODO (in the next step) control user access
?>
    

 </body>
