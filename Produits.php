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
        
        $reponse = $bdd->query('SELECT name,description,unit_price FROM products');
        $products= array();
        $i=0;
        while ($donnees = $reponse->fetch()){
            $products[$i]['name']=$donnees['name'];
            $products[$i]['description']=$donnees['description'];
            $products[$i]['unit_price']=$donnees['unit_price'];
            $i++;
        }
        for($k=0;$k<count($products)-1;$k=$k+2)
        ?>
            <div id="conteneur">
                <div id="block">
                    <a href="ProductPage.php?productid=<?php echo $k?>">    
                        <img src="image/<?php echo $products[$k]["name"]?>.png">
                        <p><big><?php echo $products[$k]["name"]?></big> </p>
                        <p><?php echo $products[$k]["description"]?></p>
                        <p>Price : <?php echo $products[$k]["unit_price"]?> €</p>
                    </a>
                </div>
                <div id="block">
                    <a href="ProductPage.php?productid=<?php echo $k+1?>">    
                        <img src="image/<?php echo $products[$k]["name"]?>.png">
                        <p><big><?php echo $products[$k+1]["name"]?></big> </p>
                        <p><?php echo $products[$k+1]["description"]?></p>
                        <p>Price : <?php echo $products[$k+1]["unit_price"]?> €</p>
                    </a>
                </div>
            </div>








        	<div class="element">
                <p>
                    <img  src="Images/Mangeoire.jpg" width="200">
                </p>
                <p id="texte">
                    <?php $reponse=$bdd->query('SELECT name,unit_price FROM products WHERE id="3"');
                    $nom=$reponse->fetch();
                    echo($nom['name']);?>
                    <br/>
                    <?php
                    echo 'Prix : ', $nom['unit_price'], ' €';
                    ?>
                </p>
            </div>

        </div> 
    </section>
    
</body>  

<!-- ================================== -->

<?php include "footer.php";?>

<!-- ================================== -->
</html>
