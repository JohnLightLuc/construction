<?php 
   require '../config.php';

  $array = array('nom'=>'','contact'=>'', 'user'=>'','ville'=>'', 'email'=>'','ville'=>'','password1'=>'','password2'=>'','error'=>'', 'message'=>'', 'verify'=>false,'success'=>false);
  $array['verify'] = false;
  

  if(!empty ($_POST)){
    $array['verify'] = true;
    $array['nom'] = $_POST['nom'];
    $array['user'] = $_POST['username'];
    $array['contact'] = $_POST['contact'];
    $array['email'] = $_POST['email'];
    $array['ville'] = $_POST['ville'];
    $array['article'] = $_POST['article'];
    $array['password1'] = $_POST['password1'];
    $array['password2'] = $_POST['password2'];
    
  
    
    if(empty($array['nom'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['user'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['contact'] )) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['email'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['ville'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['article'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['password1'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['password2'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    


    if($array['verify'])
    {
        
        if($array['password1'] !== $array['password2']) 
        {
            $array['error'] = "Les mots de passe ne sont pas identiques";
       
        }
        else{

                $db = Database::connect();

                $requete = $db->prepare("SELECT * FROM fournisseur WHERE username = ?");
                $requete->execute(array($array['user']));
                $row = $requete->fetch();
                if(!empty($row))
                {
                    $array['error'] = "Ce username existe dejà dans la base de donnée !";
                }
                else
                {
                    
                        $statement = $db->prepare("INSERT INTO `fournisseur`(`nom`, `username`, `contact`, `email`, `ville`, `article`, `password`) VALUES (?,?,?,?,?,?,?)");
                                      
                        $statement->execute(array($array['nom'], $array['user'],$array['contact'],$array['email'], $array['ville'],$array['article'], $array['password1']));
                        
                        $array['message'] ="Inscription effectuée avec succes !";
                    
                }

                }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Inscription fournisseur</title>
    <link rel="stylesheet" href="../css/fournisseur.css">

    <style>
      h1{
        text-align: center;
      }
      .red
      {
        color: red;
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

     p 
     {
      font-style: italic;
      color: red;
      text-align: center;
     }
    </style>
    
  </head>
  <body >
    
      
  <section id="inscription">
    

    <div class="conatainer-fluid">
        <div class="row">
        <div class="col-sm-3 md-3 col-lg-3"></div>
        <div class="col-sm-6 md-6 col-lg-6">
    
            <form method="POST" id="inscription-form" enctype="multipart/form-data">
    
            <div class="inscrit_client">
    
             <h1>INSCRIPTION</h1>
    
              <div class="alert">
                <p class="commnent"><?php echo $array['error']; ?> </p>
                <p class="succes"><?php echo $array['message']; ?> </p> 
              </div>
            
                
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" name="nom"  class="form-control" id="nom" placeholder="Nom" >
                  </div>
                </div>
    
               
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" name="username"  class="form-control" id="username" placeholder="Username">
                  </div>
                </div>
    
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" name="contact"  class="form-control" id="contact" placeholder="Contact" >
                  </div>
                </div>
    
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="email" name="email"  class="form-control" id="email" placeholder="Email" >
                  </div>
              </div>
    
              <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" name="ville"  class="form-control" id="ville" placeholder="Ville" >
                  </div>
              </div>

              <div class="form-group row">
              <label for="article" class="col-sm-2 col-form-label">Type d'article:</label>
              <div class="col-sm-8">
                <select class="form-control" name="article" id="article">
                    <option value=''>--- Type de matriel a vendre ---</option>
                  
                  <?php 
                    $db = Database::connect();

                    $requete = $db->query("SELECT * FROM article ");
                    

                    while($row = $requete->fetch())
                    {
                      echo "<option >". $row['libelle'] ."</option>";
                    }
                    
                  ?>
                </select>
                
              </div>
            </div>

    
              <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="password" name="password1"  class="form-control" id="password1" placeholder="Mot de passe" >
                  </div>
              </div>
    
              <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="password" name="password2"  class="form-control" id="password2"  placeholder="Entrer à nouveau le mot de passe" >
                  </div>
              </div>
    
                
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-danger" href="../index.html">Retour</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary -right">Envoyer</button>
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


    <script src="../js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </body>
</html>