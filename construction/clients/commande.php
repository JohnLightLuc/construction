
<?php 
   session_start();
   require '../config.php';
   
  $array = array('client'=>'','fournisseur'=>'','materiel'=>'', 'quantite'=>'','date'=>'','error'=>'', 'message'=>'', 'verify'=>false,'success'=>false);
  $array['verify'] = false;
  


  if(!empty ($_POST)){

    $array['verify'] = true;
    $array['client'] = intval($_SESSION['id']);
    $array['materiel'] = intval($_POST['materiel']);
    $array['fournisseur'] =intval( $_POST['fournisseur']);
    $array['quantite'] = $_POST['quantite'];
    $array['date'] = date('d/m/Y H:i:s');

    

    if(empty($array['materiel']))
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['fournisseur'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['quantite'] )) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['client'] )) 
    {
      $array['error'] = "Vous devez vous reconnectez avant de passer une commande!";
      $array['verify'] = false;
    }

   

    if($array['verify'])
    {
        
        

                $db = Database::connect();

                        $statement = $db->prepare("INSERT INTO `commande`(`client`, `fournisseur`, `materiel`, `quantite`, `date`) VALUES (?,?,?,?,?)");
                        $statement->execute(array($array['client'], $array['fournisseur'],$array['materiel'],$array['quantite'], $array['date']));
                        $array['message'] ="Votre commande a été effectuée avec succes, nous vous contacterons ulterièrement !";
        
    
                Database::disconnect();
        }
        

        
        
            
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

    <title>Inscription Clients</title>
    <link rel="stylesheet" href="../css/client.css">

    <style>
      h1{
        text-align: center;
      }
      .red
      {
        color: red;
      }
     .alert
     {
       height:100px;
     }

      small
      {
        margin: 15px;
      }
      .comment
     {
       height: 30px;
       border: 1px solid red;
     }
     .comments
     {
       font-style: italic;
       color: red;
     }
     .succes
     {
       color: green;
      
     }
     p 
     {
      font-style: italic;
      color: red;
      text-align: center;
     }
    </style>
    
  </head>
  <body id="accueil" >
  
    
      
<section id="inscription">
    

<div class="container-fluid">
    <div class="row">
    <div class="col-sm-3 md-3 col-lg-3"></div>
    <div class="col-sm-6 md-6 col-lg-6">

        <form method="POST" id="inscription-form" class="commande" >

        <div class="inscrit_client">

         <h1>Commader votre matériel</h1>

          <div class="alert">
            <p class="succes"><?php echo $array['message']; ?> </p>
            <p class="commnent"><?= $array['error']; ?> </p>
          </div>
        
            
          <div class="form-group row">
              <label for="article" class="col-sm-2 col-form-label">Type materiel:</label>
              <div class="col-sm-8">
                <select class="form-control" name="materiel" id="article">
                  <option>-----  Choisir le materiel  --------</option>
                  <?php
                      $db = Database::connect();
                      $statement = $db->query("SELECT* FROM article");
                      while($row = $statement->fetch())
                      {
                        echo "<option value='".$row['id']."'>".$row['libelle']."</option>";
                      }
                      Database::disconnect();
                  ?>
                </select>
                
              </div>
            </div>

            <div class="form-group row">
              <label for="article" class="col-sm-2 col-form-label">Fournisseur souhaiter:</label>
              <div class="col-sm-8">
                <select class="form-control" name="fournisseur" id="article">
                  <option  value="">-----  Choisir le fornisseur  -------- </option>
                  <?php
                      $db = Database::connect();
                      $statement = $db->query("SELECT* FROM fournisseur");
                      while($row = $statement->fetch())
                      {
                        echo "<option value='".$row['id']."'>".$row['nom']."</option>";
                      }
                      Database::disconnect();
                  ?>
                </select>
                
              </div>
            </div>

           
            <div class="form-group row">
            <label for="article" class="col-sm-2 col-form-label">Quantité:</label>
              <div class="col-sm-8">
                <input type="text" name="quantite"  class="form-control" id="quantite" placeholder="Quantité de materiel souhaité ">
              </div>
            </div>

            

            <div class="row">
                <div class="col-sm-6">
                <a href="accueil.php" class="btn btn-primary">Retour</a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success -right">Envoyer</button>
                </div>
            </div>

            

            
          <div>
          </form>

    </div>
      <div class="col-sm-3 md-3 col-lg-3"></div>
    </div>
</div>
</section>


    <script src="../js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </body>
</html>



