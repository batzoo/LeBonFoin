
<body><?php include "header.php";?>
   <link rel ="stylesheet" href="css/format.css" />
    <link rel ="stylesheet" href="css/main.css" />
   <?php $bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '') ;?>
 <body>
 
	<div class='titre'>
    <h1>Connexion</h1></div>

   <div class=Formulaire>
    <form action='index.php' method='POST'>
        <label for="PseudoCo">Pseudo :</label><input type="text" name="pseudoConnexion" /><br />
        <label for="mdp3">Mot de passe :</label><input type="text" name="mdpConnexion" /><br />
        <label>    </label><input type='submit' >
    </form>
 </body>
