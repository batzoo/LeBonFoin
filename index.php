

<?php  $bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '') ;
//TODO assign database connexion into $database variable
?>

<?php
session_start(include 'checkUser.php');
//TODO include checkUser.php file
?>

<?php
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
	        	<form action="Acceuil.php" method="POST">
	                <label>    </label><input type='submit' >
	    	</form>	
	       <?php endif 

//TODO (in the next step) control user access
?>

<?php
//TODO get page parameter ($_GET['page'] or $_POST['page']) and assign it into $page variable

//if 'action/'.$page'.php' exists then include it (use file_exists($filename) function)


//create one php file for each action to manage on the website

//TODO use 
//             input params (included in $_GET or $_POST)
//             $database variable (initialized in $database.php) 
// to insert or update data into database
?>

<?php
// TODO using $page decide to include header.php



//TODO add header display
?>

<?php
//TODO if 'view/'.$page'.php' exists then include it (use file_exists($filename) function)
//           else include 'view/main.php' (it has to exist)


//create one php file for each view to manage on the website (don't forget to create on main.php view)

//TODO use 
//             input params (included in $_GET or $_POST)
//             $database variable (initialized in $database.php) 
// to get data from database (if needed)

// add view display possibly using data from database

// TODO insert the end html envelope (</body></html>)
?>