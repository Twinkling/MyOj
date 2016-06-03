<?php require_once("admin-header.php");?>
<?php if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
if(isset($OJ_LANG)){
	require_once("../lang/$OJ_LANG.php");
}
if(isset($_POST['do'])){
	require_once("../include/check_post_key.php");
	$user_id=mysqli_real_escape_string($mysqli,$_POST['user_id']);
	$rightstr =$_POST['rightstr'];
	$sql="insert into `privilege` values('$user_id','$rightstr','N')";
	mysqli_query($mysqli,$sql);
	if (mysqli_affected_rows($mysqli)==1) echo "$user_id $rightstr added!";
	else echo "No such user!";
}
?>
<form method=post>
<?php require("../include/set_post_key.php");?>
	<b><?php if($OJ_LANG === 'cn'){
			echo $MSG_ADD.$MSG_USER.$MSG_PRIVILEGE;
		}else{
			echo $MSG_ADD." ".$MSG_PRIVILEGE." for ".$MSG_USER;
		}?></b><br />
	<?php echo $MSG_USER.":" ?><input type=text size=10 name="user_id"><br />
	<?php echo $MSG_PRIVILEGE.":" ?>
	<select name="rightstr">
<?php
$rightarray=array("administrator","problem_editor","contest_creator");
while(list($key, $val)=each($rightarray)) {
	if (isset($rightstr) && ($rightstr == $val)) {
		echo '<option value="'.$val.'" selected>'.$val.'</option>';
	} else {
		echo '<option value="'.$val.'">'.$val.'</option>';
	}
}
?></select><br />
	<input type='hidden' name='do' value='do'>
	<input type=submit value='<?php echo $MSG_ADD?>'>
</form>
<form method=post>
	<b><?php if($OJ_LANG === 'cn'){
			echo $MSG_ADD.$MSG_USER.$MSG_CONTEST;
		}else{
			echo $MSG_ADD." ".$MSG_CONTEST." for ".$MSG_USER;
		}?></b><br />
	<?php echo $MSG_USER.":" ?><input type=text size=10 name="user_id"><br />
	<?php echo $MSG_CONTEST.":" ?><input type=text size=10 name="rightstr">c1000 for Contest1000<br />
	<input type='hidden' name='do' value='do'>
	<input type=submit value='<?php echo $MSG_ADD?>'>
	<input type=hidden name="postkey" value="<?php echo $_SESSION['postkey']?>">
</form>
