<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" <?php echo "href=\"".$OJ_SERVE_ADD."/favicon.ico\""?> type="image/x-icon">

    <title>Login</title>  
    <?php include("template/$OJ_TEMPLATE/css.php");?>	    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="template/jmu/js/html5shiv.js"></script>
      <script src="template/jmu/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
    <?php include("template/$OJ_TEMPLATE/nav.php");?>	    
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

<form action="login.php" method="post" role="form" class="form-horizontal">
	<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo $MSG_USER_ID?></label><div class="col-sm-8"><input name="user_id" class="form-control" placeholder="<?php echo $MSG_USER_ID?>" type="text"></div>						</div>
	<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo $MSG_PASSWORD?></label><div class="col-sm-8"><input name="password" class="form-control" placeholder="<?php echo $MSG_PASSWORD?>" type="password"></div>						</div>
<?php if($OJ_VCODE){?>

	<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo $MSG_VCODE?></label><div class="col-sm-4"><input name="vcode" class="form-control" type="text"></div><div class="col-sm-4"><img alt="click to change" src="vcode.php" onclick="this.src='vcode.php?'+Math.random()" height="30px">*</div>						</div>
<?php }?>
	<div class="form-group">
	<div class="col-sm-offset-4 col-sm-4">
	<button name="submit" type="submit" class="btn btn-default btn-block">Submit</button>
	</div>
	<div class="col-sm-4">
	<a class="btn btn-default btn-block" href="registerpage.php">Register</a>
	</div>
	</div>
</form>					
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
  </body>
</html>
