
<body>
    <STYLE>A {text-decoration: none;} </STYLE>
    <section>
        
        <?php
        //chargement d'un tableau $products contenant nom,desc et prix de tous les produits de la BDD
        $reponse = $bdd->query('SELECT name,description,unit_price,id FROM products');
        $products= array();
        $i=0;$count=0;$productPerLine=3;
        ?>

        <div id="conteneur">

        <?php
        while ($donnees = $reponse->fetch()){
            if ($count % $productPerLine == 0){
                $count = 0;
                ?> </div> <div id="conteneur"> <?php
            }

            ?>
                <div id="block">
                    <a href="index.php?page=ProductPage&productid=<?php echo $donnees["id"]?>">    
                        <img id=productImg src="Images/images_produit/<?php echo $donnees["name"]?>.png">
                        <p><big><?php echo $donnees["name"]?></big> </p>
                        <p>Price : <?php echo $donnees["unit_price"]?> €/Kg</p>
                    </a>
                </div>
        <?php  
        $count = $count + 1;  
        }?>

        </div>
            

    </section>
    
</body>  