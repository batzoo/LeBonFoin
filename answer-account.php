
<head>
    <title>LeBonFoin</title>
    <link rel="stylesheet" href="css/format.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>
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
