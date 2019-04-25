<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/client.css" type="text/css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <style>
      #profile.wrap table
      {
          margin: 0 auto;
      }
      #profile
{
    margin: 70px auto;
    width: 400px;
    height: 500px; 

}

#profile .wrap
{
    padding: 50px 50px 30px 50px;
    border: 1px solid blue;
    border-radius: 10px;
    background: #fff;

}

    </style>

    </head>
    <body id="accueil">

  
        <div class="container">
        <div class="row">
        

        <aside id="profile">
            <div class="wrap">
                <div>
                    <img src="../photo/<?php echo $_SESSION['photo']; ?> "  style="width:200px; height:200px; padding-left: 35px; "  alt="ma_photo">
                </div>
               <table>
                <tr>
                    <td><h5><strong>Nom  : </strong></h5></td> <td> <h5><?php echo $_SESSION['nom']; ?> </h5><td>
                </tr>
                <tr>
                   <td> <h5><strong> Prenom: </strong><h5> </td><td><h5> <?php echo $_SESSION['prenom']; ?> </h5></td>
                </tr>
                <tr>
                   <td> <h5><strong> Contact: </strong><h5> </td><td><h5> <?php echo $_SESSION['contact']; ?> </h5></td>
                </tr>
                <tr>
                   <td> <h5><strong> Email: </strong><h5> </td><td><h5> <?php echo $_SESSION['email']; ?> </h5></td>
                </tr>
                <tr>
                   <td> <h5><strong> Ville: </strong><h5> </td><td><h5> <?php echo $_SESSION['ville']; ?> </h5></td>
                </tr>
                <tr>
                      <td><a class="btn btn-primary" href="accueil.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a></td>
                      <td></td>
                </tr>
            </table>






               
        </div>
            

        </aside>

        
        </div>
        </div>
            
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    </body> 
</html>