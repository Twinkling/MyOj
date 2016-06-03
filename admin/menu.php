<?php require_once("admin-header.php");

	if(isset($OJ_LANG)){
		require_once("../lang/$OJ_LANG.php");
	}
?>
<html>
	<head>
		<title><?php echo $MSG_ADMIN?></title>
	</head>
<body>
	<hr>
	<h4>
		<ol>
			<li>
				<a class='btn btn-info' href="../index.php" target="_parent"><?php echo $MSG_HOME?></a>
			</li>
			<li>
				<!-- <a class='btn btn-primary' href="watch.php" target="main"><b><?php //echo $MSG_SEEOJ?></b></a> -->
				<a class='btn btn-info' href="../index.php" target="main"><b><?php echo $MSG_SEEOJ?></b></a>
			</li>
<?php if (isset($_SESSION['administrator'])){
	?>
	<li>
		<a class='btn btn-info' href="news_add_page.php" target="main"><b><?php echo $MSG_ADD.$MSG_NEWS?></b></a>
</li>
	<li>
		<a class='btn btn-info' href="news_list.php" target="main"><b><?php echo $MSG_NEWS.$MSG_LIST?></b></a>
</li>
<?php }?>
			<?php if (isset($_SESSION['administrator'])){
			?>
			<?php }
			if (isset($_SESSION['administrator'])||isset($_SESSION['problem_editor'])){
			?>
			<li>
				<a class='btn btn-info' href="problem_add_page.php" target="main"><b><?php echo $MSG_ADD.$MSG_PROBLEM?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])||isset($_SESSION['problem_editor'])){
			?>
			<li>
				<a class='btn btn-info' href="problem_list.php" target="main"><b><?php echo $MSG_PROBLEM.$MSG_LIST?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])){
			?>
			<li>
				<a class='btn btn-info' href="contest_add.php" target="main"><b><?php echo $MSG_ADD.$MSG_CONTEST?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])){
			?>
			<li>
				<a class='btn btn-info' href="contest_list.php" target="main"><b><?php echo $MSG_CONTEST.$MSG_LIST?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])){
			?>
			<li>
				<a class='btn btn-info' href="setmsg.php" target="main"><b><?php echo $MSG_SETMESSAGE?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])||isset( $_SESSION['password_setter'] )){
			?>
			<li>
				<a class='btn btn-info' href="changepass.php" target="main"><b><?php echo $MSG_SETPASSWORD?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])){
			?>
			<li>
				<a class='btn btn-info' href="privilege_add.php" target="main"><b><?php echo $MSG_ADD.$MSG_PRIVILEGE?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])){
			?>
			<li>
				<a class='btn btn-info' href="privilege_list.php" target="main"><b><?php echo $MSG_PRIVILEGE.$MSG_LIST?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])){
			?>
			<li>
				<a class='btn btn-info' href="problem_export.php" target="main"><b><?php echo $MSG_EXPORT.$MSG_PROBLEM?></b></a>
			</li>
			<?php }
			if (isset($_SESSION['administrator'])){
			?>
			<li>
				<a class='btn btn-info' href="problem_import.php" target="main"><b><?php echo $MSG_IMPORT.$MSG_PROBLEM?></b></a>
			</li>
			<?php }
			if (isset($OJ_ONLINE)&&$OJ_ONLINE){
			?>
			<li>
				<a class='btn btn-info' href="../online.php" target="main"><b><?php echo $MSG_ONLINE?></b></a>
			</li>
			<?php }
			?>
		</ol>
		<?php if (isset($_SESSION['administrator'])&&!$OJ_SAE){
		?>
		<a href="problem_copy.php" target="main" title="Create your own data"><font color="eeeeee">CopyProblem</font></a> <br>
		<a href="problem_changeid.php" target="main" title="Danger,Use it on your own risk"><font color="eeeeee">ReOrderProblem</font></a>
		<?php }
		?>
	</h4>
</body>
</html>
