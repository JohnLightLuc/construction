<?php
   require "../config.php";
   session_start();

   if(isset($_GET) && !empty($_GET))
   {
      session_destroy();
      header("Location: ../index.html");
   }
   
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Accueil</title>
    <link rel="stylesheet" href="../css/fournisseur.css">

    <style>
      #accueil
{
    background: #333  url('../images/maison.jpg') no-repeat;  
}

#accueil h2
{
    margin: 100px 0 50px 0;
    text-align: center;
    text-transform: uppercase;
}

table
{
  backgound: #fff;
}


    </style>

    
  </head>
  <body id="accueil">
 <header>
 <nav class="navbar navbar-light bg-light ">
  <form method="get" class="form-inline">
      <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"> 
      <input class="btn btn-outline-success" type="submit" value="DECONNEXION" >
    </form>
</nav>
    
    </header>  

    <div class="container">   
  <section >
    

  <h2><strong>Toutes les commandes passées envers mon entreprise   </strong></h2>
                <table class="table table-primary table-bordered">
                  <thead>
                    <tr class="bg-primary">>
                        <th>libelle de la commande</th>
                        <th>Quantite de mandée</th>
                        <th>Date de commande</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      
                

                      if(!empty($_SESSION['id']))
                      {
                        $db = Database::connect();
                        $requete = $db->prepare("SELECT article.libelle, commande.quantite, commande.date FROM commande 
                                               LEFT JOIN fournisseur  ON fournisseur.id = commande.fournisseur
                                               LEFT JOIN article  ON article.id = commande.materiel 
                                               WHERE fournisseur.id = ? ORDER BY commande.id DESC ");

                        $requete->execute(array($_SESSION['id']));
                          
                        
                        while($row = $requete->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'.$row['libelle'] . '</td>';
                            echo '<td>'. $row['quantite'] . '</td>';
                            echo '<td>'. $row['date'] . '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();

                      }
                      else
                      {
                         echo "<h1 style='color:red'>Reconnectez-vous pour pouvoir visualiser vos commande<h1>";
                      }
                      
                      ?>
                  </tbody>
                </table>
                  

    </section>
    
        </div>
          <div class="col-sm-3 md-3 col-lg-3"></div>
        </div>
    </div>
    </section>
</div>

    <script src="../js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </body>
</html>










