

   <link rel ="stylesheet" href="css/format.css" />
    <link rel ="stylesheet" href="css/main.css" />
   <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '') ;?>
 <body>
 
	<div class='titre'>
    <h1>Connexion</h1></div>

    <?php
  if (empty($_POST["pseudoConnexion"])==FALSE):{
    $_SESSION['pseudo']=$_POST["pseudoConnexion"]; 
    $_SESSION['mdp']=$_POST['mdpConnexion'];
    $controlUser = $_SESSION['pseudo'];
    $controlMdp = $_SESSION['mdp'];

    $user_id_ = $bdd->prepare('SELECT id FROM users WHERE username=:usrnm AND password=:pswrd ');
    $user_id_ -> execute(array(
      'usrnm' => $_SESSION["pseudo"],
      'pswrd' => $_SESSION["mdp"]
    ));
    if($data = $user_id_ -> fetch()){
      $user_id = $data[0];
    }

    $_SESSION['id']=$user_id;

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
