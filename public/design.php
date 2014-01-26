<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/non-responsive.css" rel="stylesheet">	
	<link href="css/front.css?version=<?php echo substr(md5(microtime()),rand(0,26),10)?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>     
  </head>
  <body style="background-color: #bdc3c7">
  	<div class="container" id="wrapper" style="background-color: #ecf0f1;">	
  	
  	<?php include 'design_header.php'?>
  	<?php include 'design_detail.php'?>
  	<?php include 'design_footer.php'?>
  	</div>
  
  
  </body>
</html>
