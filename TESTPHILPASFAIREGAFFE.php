<body>
    <link rel ="stylesheet" href="css/format.css" />
    <link rel ="stylesheet" href="css/main.css" />
    <?php include "header.php";?>    
    
    <section>
       <div href="main.html">
            <center>
        	<img id="welcomeMainImage" src="Images/logo.jpg" width='350' height='250'>
            </center>
        </div>
    </section>

    <div class=Formulaire>
    <form action='ProductPage.php' method='POST'>
        <label for="Pseudo">ID produit :</label><input type="text" name="ID" /><br />
        <label>    </label><input type='submit' >
    </form>
    </div>
    <?php include "footer.php";?>
</body>