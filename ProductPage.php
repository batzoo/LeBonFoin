<?php
session_start()
?>
<!DOCTYPE html>
<html>
<?php
// Sous WAMP (Windows)
$bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '');

?>

<!--HEAD SECTION-->
<head>
    <title>LeBonFoin.fr</title> 
    <link rel="stylesheet" href="css/ProductPage.css" />
    <link rel="stylesheet" href="css/Header.css" />
</head>

<!--BODY SECTION-->
<body>

    <!--HEADER SECTION-->
	<?php include "header.php";?>
    <?php $request = $bdd->query('SELECT name, description, unit_price FROM products WHERE id = "$_POST["ID"]"');

    

  echo $request['name'], '  description :  ', $request['description'], '   !!! Coute : ', $request['unit_price'], ' euros ';  


    ?>



    <?php include "footer.php";?>

</body>
</html>
