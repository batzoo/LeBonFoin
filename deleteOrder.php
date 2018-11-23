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
        var_dump($_POST['delete']) ;                                                        
        $requete=$bdd->prepare('DELETE FROM order_products WHERE id=:id');
        $requete->bindParam('id',$_POST['delete']);
         
        $requete->execute();

        ?>
    </section>
</body>