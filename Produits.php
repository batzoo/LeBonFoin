<?php
session_start()
?>
<!DOCTYPE html>
<html>

<!-- ================================== -->

<head>
    <link rel="stylesheet" href="css/Produits.css" />
</head>

<!-- ================================== -->

 <?php include "header.php";?>
 
<!-- ================================== -->

<body>
    <STYLE>A {text-decoration: none;} </STYLE>
    <section>
        
        <?php
        //chargement d'un tableau $products contenant nom,desc et prix de tous les produits de la BDD
        
        $reponse = $bdd->query('SELECT name,description,unit_price,id FROM products');
        $products= array();
        $i=0;
        while ($donnees = $reponse->fetch()){
            ?>
            <div id="conteneur">
                <div id="block">
                    <a href="ProductPage.php?productid=<?php echo $donnees["id"]?>">    
                        <img src="Images/<?php echo $donnees["name"]?>.png">
                        <p><big><?php echo $donnees["name"]?></big> </p>
                        <p><?php echo $donnees["description"]?></p>
                        <p>Price : <?php echo $donnees["unit_price"]?> €</p>
                    </a>
                </div>
            </div>
        <?php    
        }?>
        
            








        	

        </div> 
    </section>
    
</body>  

<!-- ================================== -->

<?php include "footer.php";?>

<!-- ================================== -->
</html>
