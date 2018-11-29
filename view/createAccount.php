<body>
    <section>
       <div href="main.html">
            <center>
        	<img id="welcomeMainImage" src="Images/logo.jpg" width='350' height='250'>
            </center>
        </div>
    </section>
    <?php  $pseudo="";?>
    <div class=Formulaire>
    <form action='index.php?page=createAccount' method='POST'>
        <label for="Pseudo">Pseudo :</label><input type="text" name="pseudo" /><br />
        <label for="email">email :</label><input type="text" name="email" /><br />
        <label for="mdp1">Mot de passe :</label><input type="text" name="mdp1" /><br />
        <label for="mdp2">Confirmer mdp :</label><input type="text" name="mdp2" o /><br />
        <label>    </label><input type='submit' name='creer' >

      
    </form>
    </div>
</body>