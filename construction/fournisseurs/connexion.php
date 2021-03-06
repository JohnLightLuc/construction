<?php
   require "../config.php";
   session_start();

   $array = array('username'=>'','password'=>'','error'=>'', 'message'=>'','verify'=>false);

   if(!empty($_POST))
   {
       $array['verify'] = true;
       $array['username'] = $_POST['username'];
       $array['password']= $_POST['password'];


       if(empty($array['username']))
   {
        $array['error'] = "Tous les champs doivent être remplis !";
        $array['verify'] = false; 
   }

   if(empty($array['password']))
   {
        $array['error'] = "Tous les champs doivent être remplis !";
        $array['verify'] = false; 
   }

   if($array['verify'])
   {
       $array['success'] = true;

       $db = Database::connect();
       $requete = $db->prepare("SELECT * FROM fournisseur WHERE username = ?");
       $requete->execute(array($array['username']));
       $row = $requete->fetch();

      

       if(empty($row))
       {
         $array['error'] = 'Cette adresse username ne figure pas dans la base de donnée !';
       }
       else if($row['password'] !== $array['password'])
       {
         $array['error'] = 'Votre username ou votre mot de passe est incorrecte !';
       }
       else
       {
           $rows = array('id'=>$row['id'], 'nom'=>$row['nom'],'username'=>$row['username'], 'contact'=>$row['contact'],'email'=>$row['email'],'ville'=>$row['ville'],'article'=>$row['article'],'password'=>$row['password']);

           $_SESSION  = $rows;
           header("Location: accueil.php");
           
           
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

    <title>Connexion fournisseur</title>
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
    
      
  <section id="connexion">
    

    <div class="conatainer-fluid">
        <div class="row">
        <div class="col-sm-3 md-3 col-lg-3"></div>
        <div class="col-sm-6 md-6 col-lg-6">
    
            <form method="POST" id="inscription-form" enctype="multipart/form-data">
    
            <div class="inscrit_client">
    
             <h1>CONNEXION</h1>
    
              <div class="alert">
                <p class="commnent"><?php echo $array['error']; ?> </p>
                <p class="succes"><?php echo $array['message']; ?> </p> 
              </div>
            
              
                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="text" name="username"  class="form-control" id="username" placeholder="Username" >
                  </div>
              </div>
    
              
              <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="password" name="password"  class="form-control" id="password" placeholder="Mot de passe" >
                  </div>
              </div>
    
                <div class="row">
                    <div class="col-sm-6">
                    <a class="btn btn-warning" href="../index.html"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary ">se connecter</button>
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










