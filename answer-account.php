<?php
session_start()
?>
<body>
    
    <?php include "header.php";?>   
    <link rel ="stylesheet" href="css/format.css" />
    <link rel ="stylesheet" href="css/main.css" />
    <section>
       <div href="main.html">
            <center>
        	<img id="welcomeMainImage" src="Images/baptiste.jpg">
            </center>
        </div>
    </section>

    <section>

<?php 
echo "<p>Votre compte a bien été créé, " . $_POST["pseudo"] . "</p>" ;
?>

    </section>
    <?php include "footer.php";?>
</body>
