<?php require("admin-header.php");

        if(isset($OJ_LANG)){
                require_once("../lang/$OJ_LANG.php");
        }


//echo "<title>$MSG_</title>";
echo "<center><h2>$MSG_CONTEST$MSG_LIST</h2></center>";
require_once("../include/set_get_key.php");
$sql="SELECT max(`contest_id`) as upid, min(`contest_id`) as btid  FROM `contest`";
$page_cnt=50;
$result=mysqli_query($mysqli,$sql);
echo mysql_error();
$row=mysqli_fetch_object($result);
$base=intval($row->btid);
$cnt=intval($row->upid)-$base;
$cnt=intval($cnt/$page_cnt)+(($cnt%$page_cnt)>0?1:0);
if (isset($_GET['page'])){
        $page=intval($_GET['page']);
}else $page=$cnt;
$pstart=$base+$page_cnt*intval($page-1);
$pend=$pstart+$page_cnt;
for ($i=1;$i<=$cnt;$i++){
        if ($i>1) echo '&nbsp;';
        if ($i==$page) echo "<span class=red>$i</span>";
        else echo "<a href='contest_list.php?page=".$i."'>".$i."</a>";
}
$sql="select `contest_id`,`title`,`start_time`,`end_time`,`private`,`defunct` FROM `contest` where contest_id>=$pstart and contest_id <=$pend order by `contest_id` desc";
$keyword=$_GET['keyword'];
$keyword=mysqli_real_escape_string($mysqli,$keyword);
if($keyword) $sql="select `contest_id`,`title`,`start_time`,`end_time`,`private`,`defunct` FROM `contest` where title like '%$keyword%' ";
$result=mysqli_query($mysqli,$sql) or die(mysql_error());
?>
<form action=contest_list.php class=center><input name=keyword><input type=submit value="<?php echo $MSG_SEARCH?>" ></form>


<?php
echo "<center><table class='table table-striped' width=90% border=1>";
echo "<tr><td>$MSG_CONTEST"."ID<td>$MSG_TITLE<td>$MSG_DATE_ARRAY[StartTime]<td>$MSG_DATE_ARRAY[EndTime]<td>$MSG_Public/$MSG_Private<td>$MSG_STATUS<td>$MSG_EDIT<td>$MSG_COPY<td>$MSG_EXPORT<td>$MSG_LOGS";
echo "</tr>";
for (;$row=mysqli_fetch_object($result);){
        echo "<tr>";
        echo "<td>".$row->contest_id;
        echo "<td><a href='../contest.php?cid=$row->contest_id'>".$row->title."</a>";
        echo "<td>".$row->start_time;
        echo "<td>".$row->end_time;
        $cid=$row->contest_id;
        if(isset($_SESSION['administrator'])||isset($_SESSION["m$cid"])){
                echo "<td><a href=contest_pr_change.php?cid=$row->contest_id&getkey=".$_SESSION['getkey'].">".($row->private=="0"?"<span class=green>Public</span>":"<span class=red>Private<span>")."</a>";
                echo "<td><a href=contest_df_change.php?cid=$row->contest_id&getkey=".$_SESSION['getkey'].">".($row->defunct=="N"?"<span class=green>Available</span>":"<span class=red>Reserved</span>")."</a>";
                echo "<td><a href=contest_edit.php?cid=$row->contest_id>$MSG_EDIT</a>";
                echo "<td><a href=contest_add.php?cid=$row->contest_id>$MSG_COPY</a>";
                if(isset($_SESSION['administrator'])){
                        echo "<td><a href=\"problem_export_xml.php?cid=$row->contest_id&getkey=".$_SESSION['getkey']."\">$MSG_EXPORT</a>";
                }else{
                  echo "<td>";
                }
     echo "<td> <a href=\"../export_contest_code.php?cid=$row->contest_id&getkey=".$_SESSION['getkey']."\">$MSG_LOGS</a>";
        }else{
                echo "<td colspan=5 align=right><a href=contest_add.php?cid=$row->contest_id>$MSG_COPY</a><td>";

        }

        echo "</tr>";
}
echo "</table></center>";
require("../oj-footer.php");
?>
