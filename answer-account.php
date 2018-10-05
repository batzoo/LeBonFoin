<body>
    
    <?php include "header.php";?>   

    <section>
       <div href="main.html">
        	<img id="welcomeMainImage" src="Images/logo.jpg">
        </div>
    </section>

    <section>

<?php 
echo "<p>Votre compte a bien été créé, " . $_POST["pseudo"] . "</p>" ;
?>

    </section>
    <?php include "footer.php";?>
</body>
