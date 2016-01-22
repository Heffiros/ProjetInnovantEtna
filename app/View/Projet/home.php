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
      <fieldset>
      <legend>Description</legend>
      </div>          
      <?php
      if (count($projet['descriptif']) != 0) {
        echo $projet['descriptif'];
      } else {
        echo "Il n'y a pas encore de description\n";
      }
      ?>
      </fieldset>
      <br>
      <a onclick="aff_form(<?php echo$projet['id'] ?>)">Modifier la description</a>
      <div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modifier</button>

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

      </div>
<div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>