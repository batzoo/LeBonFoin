<body>
    <section>
            <center>
            <img id="welcomeMainImage" src="Images/logo.jpg" width='350' height='250'>
            </center>
        </div>
    </section>
    <section>

<?php
    $_SESSION['currentpage']="accueil";

    if(empty($_SESSION['pseudo'])==true){
    $pseudoCo = 'et bienvenue !';
}
    else{
    $pseudoCo=$_SESSION['pseudo'];
    }?>


<div class='titre'>  
    <h1>Bonjour <?php echo ($pseudoCo) ?> </h1></div>
    <h1>Bienvenue sur LeBonFoin.fr</h1></div>
<div class='soustitre'>
    <h1>Fournisseur officiel des agriculteurs des Haut-de-France depuis 1892 !</h1>
    <h1>Bonne navigation ! :)</h1>
</div>
    </section>
</body>
