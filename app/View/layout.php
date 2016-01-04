
<html>
  <head>
    <title>EstiTracker</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>vendor/bower/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH ?>app/Stylesheet/style.css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
    <meta charset="utf-8" />
    <script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>
  </head>
  <body>
    <nav class="navbar navbar-trans navbar-fixed-top" role="navigation" style="position:relative; margin: 0;">
      <div class="container">
	<div class="navbar-header">
	  <a class="navbar-brand text-danger" href="/" style="color: #A6E4CF;">EstiTracker</a>
	</div>
	<div class="navbar-collapse collapse" id="navbar-collapsible">
	</div>
      </div>
    </nav>
    <div class="row marketing">
      <?php echo $data ?>
    </div>
  </body>
</html>
