<body>
     
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
        $requete=$bdd->prepare('DELETE FROM order_products WHERE id=:id')
        $requete->bindParam('id',$_POST['id']);
        ?>