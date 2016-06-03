<?php require("admin-header.php");
require_once("../include/set_get_key.php");
if (!isset($_SESSION['administrator'])){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
if(isset($OJ_LANG)){
	require_once("../lang/$OJ_LANG.php");
}
//echo "<title>Problem List</title>";
echo "<center><h2>$MSG_NEWS$MSG_LIST"."</h2></center>";
$sql="select `news_id`,`user_id`,`title`,`time`,`defunct` FROM `news` order by `news_id` desc";
$result=mysqli_query($mysqli,$sql) or die(mysql_error());
echo "<center><table width=90% border=1>";

echo "<tr><td>PID<td>$MSG_TITLE<td>$MSG_DATE<td>$MSG_STATUS<td>$MSG_OPERATION</tr>";
for (;$row=mysqli_fetch_object($result);){
	echo "<tr>";
	echo "<td>".$row->news_id;
	//echo "<input type=checkbox name='pid[]' value='$row->problem_id'>";
	echo "<td><a href='news_edit.php?id=$row->news_id'>".$row->title."</a>";
	echo "<td>".$row->time;
	echo "<td><a href=news_df_change.php?id=$row->news_id&getkey=".$_SESSION['getkey'].">".($row->defunct=="N"?"<span class=green>Available</span>":"<span class=red>Reserved</span>")."</a>";
		echo "<td><a href=news_edit.php?id=$row->news_id>$MSG_EDIT</a>";
	
	echo "</tr>";
}

echo "</tr></form>";
echo "</table></center>";
require("../oj-footer.php");
?>
