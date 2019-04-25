<!DOCTYPE html>
<html>
    <head>
    <title>Admin</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <link rel="stylesheet" href="../css/admin.css">
        <style>
         #admin h1
          {
            margin-top: 100px;
            text-align:center;
            font-family: 'Permanent Marker', cursive;
          }

          h2
          {
            margin-top: 100px;
          }
        </style>
    </head>
<body id="admin" data-spy="scroll" data-target=".navbar" data-offset="60">

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
                            <ul class="nav navbar-nav navbar-center">
                                <li><a href="">Accueil</a></li>
                                <li><a href="#client">Les clients</a></li>
                                <li><a href="#fournisseur">Founisseur</a></li>
                                <li><a href="#commande">Commandes</a></li>
                    
                            </ul> 
                        </div>
                    
                    </div>
                
                </nav>
    </header>
    
    <div class="container">

         <h1>Bienvenue dans votre espace d'adminsitration !</h1>
    <section id="client">
        <h2 ><strong>Liste des clients:   </strong><a href="client/create.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Contact</th>
                      <th>Email</th>
                      <th>Ville</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require '../config.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM  clients ORDER BY id DESC');
                        while($client = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'.$client['nom'] . '</td>';
                            echo '<td>'. $client['prenom'] . '</td>';
                            echo '<td>'. $client['contact'] . '</td>';
                            echo '<td>'. $client['email'] . '</td>';
                            echo '<td>'. $client['ville'] . '</td>';
                            echo '<td><img style="width: 100px; height:100px;"  src="../photo/'. $client['photo'] . '"></td>';
                            echo '<td width=300>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="client/update.php?id='.$client['id'].'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="client/delete.php?id='.$client['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
    </section>
    <section id="fournisseur">

        <h2><strong>Liste des fournisseurs: </strong>  <a href="fournisseur/create.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom d'entreprise</th>
                      <th>Username</th>
                      <th>Contact</th>
                      <th>Email</th>
                      <th>Ville</th>
                      <th>Article vendu</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM fournisseur ORDER BY id DESC ');
                        while($client = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'.$client['nom'] . '</td>';
                            echo '<td>'. $client['username'] . '</td>';
                            echo '<td>'. $client['contact'] . '</td>';
                            echo '<td>'. $client['email'] . '</td>';
                            echo '<td>'. $client['ville'] . '</td>';
                            echo '<td>'. $client['article'] . '</td>';
                            echo '<td width=300>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="fournisseur/update.php?id='.$client['id'].'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="fournisseur/delete.php?id='.$client['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>

    </section>

    <section id="commande">
                    
    <h2><strong>Liste des commande:   </strong><a href="commande/create.php" class="btn btn-success "><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th colspan="2" >Client</th>
                      <th colspan="2">Fornisseur</th>
                      <th colspan="3">Commande</th>
                      <th>Action</th>
                      
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Contact</th>
                        <th>Materiel</th>
                        <th>Quantite</th>
                        <th>Date de commande</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                
                        $db = Database::connect();
                        
                         $requete = $db->query("SELECT clients.nom, clients.email, commande.quantite, commande.date, commande.id, fournisseur.username, fournisseur.contact, article.libelle  FROM commande 
                                                LEFT JOIN clients ON commande.client = clients.id
                                                LEFT JOIN fournisseur ON commande.fournisseur = fournisseur.id 
                                                LEFT JOIN article ON commande.materiel = article.id ORDER BY commande.id DESC");
                       
                 
                        while($row = $requete->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'.$row['nom'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['username'] . '</td>';
                            echo '<td>'. $row['contact'] . '</td>';
                            echo '<td>'. $row['libelle'] .'</td>';
                            
                            echo '<td>'. $row['quantite'] . '</td>';
                            echo '<td>'. $row['date'] . '</td>';
                            echo '<td>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="commande/update.php?id='.$row['id'].'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="commande/delete.php?id='.$row['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
    </section>

</div>

    </body>

</html>