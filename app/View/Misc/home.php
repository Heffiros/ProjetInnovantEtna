<link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>app/Stylesheet/home.css" />

<div class="calque">
</div>

<div class="slider1" style="background :url(<?php echo BASEPATH?>app/Media/slide1.jpg) fixed center no-repeat;
background-color : #264151; height : 100%;">
</div>

<section class="container-fluid" id="section1">
    <div class="v-center">
        <h1 class="text-center">EstiTracker</h1>
        <h2 class="text-center lato animate slideInDown ">La nouvelle interface <b>B2C</b></h2>
        <p class="text-center">
            <br>
            <a href="#" style="width:212px;" class="btn btn-default btn-lg btn-huge lato" data-toggle="modal" data-target="#myModal1">Inscription</a>
            <br>
            <br>
            <a href="#" style="width:212px;" class="btn btn-default btn-lg btn-huge lato" data-toggle="modal" data-target="#myModal">Connexion</a>
        </p>
    </div>
  
</section>

<!-- MODAL CONNETION-->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center"><br>Connexion</h2>
            </div>
            <div class="modal-body row">
                <!-- <h6 class="text-center">COMPLETE THESE FIELDS TO CONNECT</h6> -->
                <form class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0" action="" method="post" >
                    <fieldset>
                	<div class="form-group">
                    <input type="text" name="mail" id="mail" class="form-control" placeholder="Mail">
                	</div>
                	<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe (taille : 8 a 16 caractères)">
                	</div>
                	<div class="form-group">
                	<input type="submit"  class="btn btn-primary"/>
                	</div>
                </fieldset>
                </form>
            </div>
           
        </div>
    </div>
</div>
<!-- Creation--> 
<div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center"><br>Inscription</h2>
            </div>
            <div class="modal-body row">
               <!--  <h6 class="text-center">COMPLETE THESE FIELDS TO SIGN UP</h6> -->
                <form class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0" action='' method='POST'>
                <fieldset>
                	<div class="form-group">
                    <input type="text" name="mail" id="mail" class="form-control" placeholder="Mail">
                	</div>
                	<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe (taille : 8 a 16 caractères)">
                	</div>
                	<div class="form-group">
                	<input type="submit"  class="btn btn-primary"/>
                	</div>
                </fieldset>
                </form>
            </div>
         
        </div>
    </div>
</div>

    <!--scripts loaded here-->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <script src="js/scripts.js"></script>