<?php require("admin-header.php");
require_once("../include/set_get_key.php");
if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
if(isset($OJ_LANG)){
	require_once("../lang/$OJ_LANG.php");
}
//echo "<title>$MSG_PRIVILEGE.$MSG_LIST</title>";
echo "<center><h2>$MSG_PRIVILEGE$MSG_LIST</h2></center>";
$sql="select * FROM privilege where rightstr in ('administrator','source_browser','contest_creator','http_judge','problem_editor') ";
$result=mysqli_query($mysqli,$sql) or die(mysql_error());
echo "<center><table class='table table-striped' width=60% border=1>";
echo "<thead><tr><td>$MSG_USER<td>$MSG_PRIVILEGE<td>$MSG_OPERATION</tr></thead>";
for (;$row=mysqli_fetch_object($result);){
	echo "<tr>";
	echo "<td>".$row->user_id;
	echo "<td>".$row->rightstr;
//	echo "<td>".$row->start_time;
//	echo "<td>".$row->end_time;
//	echo "<td><a href=contest_pr_change.php?cid=$row->contest_id>".($row->private=="0"?"Public->Private":"Private->Public")."</a>";
	echo "<td><a href=privilege_delete.php?uid=$row->user_id&rightstr=$row->rightstr&getkey=".$_SESSION['getkey'].">$MSG_DELETE</a>";
//	echo "<td><a href=contest_edit.php?cid=$row->contest_id>Edit</a>";
//	echo "<td><a href=contest_add.php?cid=$row->contest_id>Copy</a>";
	echo "</tr>";
}
echo "</table></center>";
require("../oj-footer.php");
?>
