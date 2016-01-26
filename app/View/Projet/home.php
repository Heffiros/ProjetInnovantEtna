    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>app/Stylesheet/projet.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Projet Innovant</a>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <?php
              if ($user['role'] == 2) {
            ?>
            <li><a href="<?php echo BASEPATH ?>index.php/equipe">Gérer les équipes</a></li>
            <?php
            } 
            ?>
            <li><a href="<?php echo BASEPATH ?>index.php/projet">Projets</a></li>
            <li><a href="<?php echo BASEPATH ?>index.php/meeting">Meeting</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php echo $projet['nom'] ?></h1>
      <div class="row">


       <div class="panel panel-default">
            <div class="panel-heading">
            <h2>Description</h2>
            </div>
            <div class="panel-body">
                <?php
                if (count($projet['descriptif']) != 0) {
                  echo $projet['descriptif'];
                } else {
                  echo "Il n'y a pas encore de description\n";
                }
                ?>
                <br>
                <br>
            <button type="button" class="btn btn-info modif" data-toggle="modal" data-target="#myModal">Modifier</button>
            </div>
          </div> 
      <br>
      <div class="container">
    <!-- Trigger the modal with a button -->

  <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modifier la description du projet</h4>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?php echo BASEPATH ?>index.php/projet/modifdescription">
              <div class="form-group">
              <label for="comment">Description :</label>
              <textarea class="form-control" rows="15" cols="300" id="comment" name="descriptif"><?php echo $projet['descriptif']?></textarea>
              </div>  
              <div class="form-group">
              <input type="submit" class="btn btn-success" value="Modifier"></button>
              </div>
              <input type="hidden" name="id_projet" value="<?php echo $projet['id']?> ">
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Annuler</button>
          </div>
        </div>
      </div>
    </div>
</div>
<br>
<div class="row">
  <?php
  if (count($meeting) != 0) {
    foreach ($meeting as $value) {
      $icon = "";
      if ($value['deleted_at'] != '0000-00-00')
        $icon = "<i class='fa fa-check'></i>";

      if (strtotime($value['updated_at']) < strtotime(date('Y-m-d'))) {
        echo "<p class='bg-danger meeting red'>Rendez-vous du ".$value['updated_at']." $icon </p>";
      } else if (strtotime($value['updated_at']) > strtotime(date('Y-m-d'))) {
        echo "<p class='bg-success meeting green' >Rendez-vous du ".$value['updated_at']." </p>";
      } else {
        echo "<p class='bg-info meeting green'>Rendez-vous du ".$value['updated_at']."</p>";
      }
    } 
  } else {
    echo "Pas de rendez-vous programmé";
  }


  ?>

</div>
</div>
<div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>