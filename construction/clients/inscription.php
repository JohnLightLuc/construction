<?php 
   require '../config.php';

  $array = array('nom'=>'','prenom'=>'','contact'=>'', 'email'=>'','ville'=>'','password1'=>'','password2'=>'','photo'=>'','imageError'=>'','error'=>'', 'message'=>'', 'verify'=>false,'success'=>false);
  $array['verify'] = false;
  

  if(!empty ($_POST)){
    $array['verify'] = true;
    $array['nom'] = $_POST['nom'];
    $array['prenom'] = $_POST['prenom'];
    $array['contact'] = $_POST['contact'];
    $array['email'] = $_POST['email'];
    $array['ville'] = $_POST['ville'];
    $array['password1'] = $_POST['password1'];
    $array['password2'] = $_POST['password2'];

    $array['photo'] = $_FILES['photo']['name'];
    $tmp            = $_FILES['photo']['tmp_name'];
    $imagePath          = '../photo/'. basename($array['photo']);
    $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
    $isSuccess          = true;
    $isUploadSuccess    = false;

    
    if(empty($array['nom'])) 
    {
      $array['error'] = "Tous les champs obligatoires doivent être remplis";
      $array['verify'] = false;
    }

    if(empty($array['prenom'])) 
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

    if(empty($array['photo']))
    {
      $array['error'] = "Vous n'avez pas charger votre photo !";
      $array['verify'] = false;
    }
    else
    {
      $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif") 
            {
              $array['imageError'] = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $array['imageError'] = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["photo"]["size"] > 500000) 
            {
              $array['imageError'] = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($tmp, $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
       
    }

    


    if($array['verify'] &&  $isUploadSuccess)
    {
        
        if($array['password1'] !== $array['password2']) 
        {
            $array['error'] = "Les mots de passe ne sont pas identiques";
       
        }
        else{

                $db = Database::connect();

                $requete = $db->prepare("SELECT * FROM clients WHERE email = ?");
                $requete->execute(array($array['email']));
                $row = $requete->fetch();
                if(!empty($row))
                {
                $array['error'] = "Votre adresse mail figure deja dans la liste des inscrits !";
                }
                else
                {
                        
                        $statement = $db->prepare("INSERT INTO `clients`(`nom`, `prenom`, `contact`, `email`, `ville`, `password`,`photo`) VALUES (?,?,?,?,?,?,?)");
                        $statement->execute(array($array['nom'], $array['prenom'],$array['contact'],$array['email'], $array['ville'], $array['password1'], $array['photo']));
                        
                        header("Location: connexion.php");
                    
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
                <input type="text" name="prenom"  class="form-control" id="prenom" placeholder="Nom">
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
              <div class="col-sm-10">
                <input type="password" name="password1"  class="form-control" id="password1" placeholder="Mot de passe" >
              </div>
          </div>

          <div class="form-group row">
              <div class="col-sm-10">
                <input type="password" name="password2"  class="form-control" id="password2"  placeholder="Entrer à nouveau le mot de passe" >
              </div>
          </div>

            <div class="form-group row">
              <label for="photo" class="col-sm-2 col-form-label">Photo:</label>
              <div class="col-sm-8">
                <input type="file"  class="form-control" name="photo" id="photo" placeholder="mot de passe">
                <p> <?php echo $array['imageError']; ?></p>
              </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <a href="../index.html" class="btn btn-danger">Retour</a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary ">Envoyer</button>
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