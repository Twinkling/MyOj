<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>New Problem</title>
</head>
<body leftmargin="30" >

<?php require_once("../include/db_info.inc.php");?>
<?php require_once("admin-header.php");
if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
if(isset($OJ_LANG)){
	require_once("../lang/$OJ_LANG.php");
}
?>
<?php
include_once("kindeditor.php") ;
?>
<center>
	<h2><?php echo $MSG_ADD.$MSG_NEWS ?></h2>
</center>
<form method="POST" action="newsAdd.php">
<p align=left><?php echo $MSG_TITLE.":" ?><input type=text name=title size=71></p>

<p align=left><?php echo $MSG_CONTENT.":"?><br>
<textarea class=kindeditor name=content ></textarea>
</p>
<input type=submit value=Submit name=submit>
<?php require_once("../include/set_post_key.php");?>
</div></form>
<p>
<?php require_once("../oj-footer.php");?>
</body></html>

