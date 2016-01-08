<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gérer les équipes</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>app/Stylesheet/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>app/Stylesheet/team.css" />
   
    <script src="ie-emulation-modes-warning.js"></script>

  
  </head>

  <body>

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
          <h1 class="page-header">Gérer les équipes</h1>
            
            
            <!-- Gestion des boutons pour selectionner les promotions -->
            <div class="row">
              <div class="col-xs-6 col-md-3 boutongrouppromo">
            <?php
              foreach ($allPromotion as $value) {
                echo "<button style='margin_left:10px' class='btn btn-primary btn-lg boutonpad' onclick='test($value)'>$value</button>";
              }
            ?>
            </div>
          </div>
            <!-- ####################################"  -->
        
              <div id="contenu_dyna"></div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>

    <script>
      function test(promotion) {
        
        var base = <?php echo BASEPATH ?>;
        var url_promo = base + 'index.php/equipe/promotion';

        $.ajax({
        async: true,
        type: 'POST',
        data: {promotion : promotion},
        url: url_promo,
        success: function(data){
          $("#contenu_dyna").html(data);
        }
        });
      
      }

    </script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>
