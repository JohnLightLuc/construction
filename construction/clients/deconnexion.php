<?php
    require '../config.php';
    session_start();

    if(!empty($_POST)) 
    {
        
        session_destroy();
        header("Location: ../index.html"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Construction</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body id="delete" class="image">
    <div class="col-lg-10 col-lg-offset-1">
         <div class="container admin">
            <div class="row">
                
                <div class="col-xs-8 col-md-8 col-xs-offset-2 col-md-offset-2 ">
                <form class="form"  role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>"/>
                    <p class="alert alert-warning">Etes vous sûr de vouloir vous deconnecter ?</p>
                    <div class="form-actions">
                      <a class="btn btn-default" href="accueil.php">Non</a>
                      <button type="submit" class="btn btn-warning">Oui</button>
                    </div>
                </form>
            </div>
            </div>
        </div>   
    </body>
</html>
