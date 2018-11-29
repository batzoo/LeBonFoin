

<?php  
session_start();
include "database.php";
$_SESSION['currentpage']="accueil";
?>



<?php
$page='accueil'; // default value
if (isset($_GET['page'])){
	$page=$_GET['page'];
} 
else if(isset($_POST['page'])){
	$page=$_POST['page'];
}
include 'header.php';
if (file_exists('actions/'.$page.'.php')){
	include('actions/'.$page.'.php');
		}
	elseif(file_exists('view/'.$page.'.php')){
			include 'view/'.$page.'.php';
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