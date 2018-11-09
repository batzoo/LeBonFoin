

<?php  $bdd = new PDO('mysql:host=localhost;dbname=LeBonFoin;charset=utf8', 'root', '') ;
//TODO assign database connexion into $database variable
?>

<?php
session_start();
?>

     <?php
//TODO (in the next step) control user access
?>

<?php
	if(!empty($_GET['page'])){
		$page=$_GET['page'];
		
		if (file_exists('actions/'.$page.'.php')){

			include('actions/'.$page.'.php');
		}
		elseif(file_exists('view/'.$page.'.php')){
			include 'header.php';
			include('view/'.$page.'.php');
		}
		else{
		header('location: index.php?page=accueil');
	}
	}


//create one php file for each action to manage on the website

//TODO use 
//             input params (included in $_GET or $_POST)
//             $database variable (initialized in $database.php) 
// to insert or update data into database
?>

<?php
// TODO using $page decide to include header.php




//TODO add header display
?>

<?php
//TODO if 'view/'.$page'.php' exists then include it (use file_exists($filename) function)
//           else include 'view/main.php' (it has to exist)


//create one php file for each view to manage on the website (don't forget to create on main.php view)

//TODO use 
//             input params (included in $_GET or $_POST)
//             $database variable (initialized in $database.php) 
// to get data from database (if needed)

// add view display possibly using data from database

// TODO insert the end html envelope (</body></html>)
?>
<footer>
	<?php include 'footer.php';?>
	
</footer>