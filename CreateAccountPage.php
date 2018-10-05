<body>
    <link rel ="stylesheet" href="css/format.css" />
    <link rel ="stylesheet" href="css/main.css" />
    <?php include "header.php";?>    
    
    <section>
       <div href="main.html">
        	<img id="welcomeMainImage" src="Images/logo.jpg">
        </div>
    </section>

    <div class=Formulaire>
    <form action='answer-account.php' method='POST'>
        <label for="Pseudo">Pseudo :</label><input type="text" name="pseudo" /><br />
        <label for="mdp1">Mot de passe :</label><input type="text" name="mdp1" /><br />
        <label for="mdp2">Confirmer mdp :</label><input type="text" name="mdp2" /><br />
        <input type='submit' >
    </form>
    </div>
    <?php include "footer.php";?>
</body>