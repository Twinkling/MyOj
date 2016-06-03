<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" <?php echo "href=\"".$OJ_SERVE_ADD."/favicon.ico\""?> type="image/x-icon">

    <title><?php echo $OJ_NAME?></title>  
    <?php include("template/$OJ_TEMPLATE/css.php");
//    echo dirname(__FILE__);
      if(isset($OJ_LANG)){
        require_once("lang/$OJ_LANG.php");
      }
    ?>


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
	<form action="modify.php" method="post">
<br><br>
<center><table>
<tr><td colspan=2 height=40 width=500><?php echo $MSG_UPDATE?></tr>
<tr><td width=25%><?php echo $MSG_USER."ID:"?>
<td width=75%><?php echo $_SESSION['user_id']?>
<?php require_once('./include/set_post_key.php');?>
</tr>
<tr><td><?php echo $MSG_NICK.":"?>
<td><input name="nick" size=50 type=text value="<?php echo htmlentities($row->nick,ENT_QUOTES,"UTF-8")?>" >
</tr>
<tr><td><?php echo $MSG_OLD.$MSG_PASSWORD.":"?>
<td><input name="opassword" size=20 type=password>
</tr>
<tr><td><?php echo $MSG_NEW.$MSG_PASSWORD.":"?>
<td><input name="npassword" size=20 type=password>
</tr>
<tr><td><?PHP ECHO $MSG_REPEAT_PASSWORD.":"?>
<td><input name="rptpassword" size=20 type=password>
</tr>
<tr><td><?PHP ECHO $MSG_SCHOOL.":"?>
<td><input name="school" size=30 type=text value="<?php echo htmlentities($row->school,ENT_QUOTES,"UTF-8")?>" >
</tr>
<tr><td><?PHP ECHO $MSG_EMAIL.":"?>
<td><input name="email" size=30 type=text value="<?php echo htmlentities($row->email,ENT_QUOTES,"UTF-8")?>" >
</tr>
<tr><td>
<td><input value="Submit" name="submit" type="submit">
&nbsp; &nbsp;
<input value="Reset" name="reset" type="reset">
</tr>
</table></center>
<br>
<a href=export_ac_code.php>Download All AC Source</a>
<br>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
  </body>
</html>
