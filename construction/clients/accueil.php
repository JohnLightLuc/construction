<?php
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil client</title>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="../css/client.css" type="text/css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    
        
    <style>

#accueil
{
    background: rgba(255,255,255, 0.3) url('../images/bg2.jpg');
    background-position: 100vh;
}


    </style>
    </head>
    <body id="accueil" data-spy="scroll" data-target=".navbar" data-offset="60">
    <header>

<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="">Home</a></li>
                        <li><a href="commande.php">Passer une commande</a></li>
                        <li><a href="profile.php">Mon profile</a></li>
                        <li><a href="deconnexion.php">Deconnexion</a></li>
                        
                    </ul> 
                </div>
            
            </div>
        
        </nav>

    </header>

        
         <section id="text-principal">
            <h1>Bienvenue dans votre space construction commandez-vos<br> materiaux de construction et  nous comblerons toutes vos attentes. <br> Vos mateiaux seront livés dans un delai d'au plus 3 jours.<br> Nos materiaux sont tous de bonne qualité et à de meilleurs prix. </h1>
        
        </section>  
        
    </body>
</html>