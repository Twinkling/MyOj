<?php @session_start();
	ini_set("display_errors","Off");
static 	$DB_HOST="localhost"; // 数据库的服务器地址
static 	$DB_NAME="jol"; // 数据库名
static 	$DB_USER="root"; // 数据库用户名
static 	$DB_PASS="TwinklingZ"; // 数据库密码
	// connect db 
static 	$OJ_NAME="JMU"; // OJ的名字，将取代页面标题等位置HUSTOJ字样。
static 	$OJ_HOME="./"; // OJ的首页地址
static 	$OJ_ADMIN="root@localhost"; // 管理员email
static 	$OJ_DATA="/home/judge/data"; // 测试数据所在目录，实际位置。
static 	$OJ_BBS="discuss3"; //"bbs" 论坛的形式，discuss为自带的简单论坛，bbs为外挂论坛，参考bbs.php代码。
static  $OJ_ONLINE=false; // 是否使用在线监控，需要消耗一定的内存和计算，因此如果并发大建议关闭
static  $OJ_LANG="cn"; // 默认的语言，中文为cn
static  $OJ_SIM=false; // 是否显示相似度检测的结果。
static  $OJ_DICT=false; // 是否启用在线英字典
static  $OJ_LANGMASK=0; //1mC 2mCPP 4mPascal 8mJava 16mRuby 32mBash 1008 for security reason to mask all other language 用掩码表示的OJ接受的提交语言，可以被比赛设定覆盖。
static  $OJ_EDITE_AREA=true;//true: syntax highlighting is active  是否启用高亮语法显示的提交界面，可以在线编程，无须IDE。
static  $OJ_AUTO_SHARE=false; // true: 自动分享代码，启用的话，做出一道题就可以在该题的Status中看其他人的答案。
static  $OJ_CSS="hoj.css"; // 默认的css,可以选择dark.css和gcode.css,具有有限的界面制定效果。
static  $OJ_SAE=false; // 是否是在新浪的云平台运行web部分
static  $OJ_VCODE=false; // 是否启用图形登录、注册验证码。
static  $OJ_APPENDCODE=false; // 是否启用自动添加代码，启用的话，提交时会参考$OJ_DATA对应目录里是否有append.c一类的文件，有的话会把其中代码附加到对应语言的答案之后，巧妙使用可以指定main函数而要求学生编写main部分调用的函数。
static  $OJ_MEMCACHE=false; // 是否使用memcache作为页面缓存，如果不启用则用/cache目录
static  $OJ_MEMSERVER="127.0.0.1"; // memcached的服务器地址
static  $OJ_MEMPORT=11211; // memcached的端口
static  $SAE_STORAGE_ROOT="http://hustoj-web.stor.sinaapp.com/";
static  $OJ_TEMPLATE="jmu";
if(isset($_GET['tp'])) $OJ_TEMPLATE=$_GET['tp'];
static  $OJ_LOGIN_MOD="hustoj";
static  $OJ_RANK_LOCK_PERCENT=0; // //比赛封榜时间的比率，如5小时比赛设为0.2则最后1小时封榜。
static  $OJ_SHOW_DIFF=false; // //显示WrongAnswer时的对比
static  $OJ_TEST_RUN=false;
static $OJ_OPENID_PWD = '8a367fe87b1e406ea8e94d7d508dcf01';

/* weibo config here */
static  $OJ_WEIBO_AUTH=false;
static  $OJ_WEIBO_AKEY='1124518951';
static  $OJ_WEIBO_ASEC='df709a1253ef8878548920718085e84b';
static  $OJ_WEIBO_CBURL='http://192.168.0.108/JudgeOnline/login_weibo.php';

/* renren config here */
static  $OJ_RR_AUTH=false;
static  $OJ_RR_AKEY='d066ad780742404d85d0955ac05654df';
static  $OJ_RR_ASEC='c4d2988cf5c149fabf8098f32f9b49ed';
static  $OJ_RR_CBURL='http://192.168.0.108/JudgeOnline/login_renren.php';
/* qq config here */
static  $OJ_QQ_AUTH=false;
static  $OJ_QQ_AKEY='1124518951';
static  $OJ_QQ_ASEC='df709a1253ef8878548920718085e84b';
static  $OJ_QQ_CBURL='192.168.0.108';


//if(date('H')<5||date('H')>21||isset($_GET['dark'])) $OJ_CSS="dark.css";
if (isset($_SESSION['OJ_LANG'])) $OJ_LANG=$_SESSION['OJ_LANG'];
global $mysqli;
	if($OJ_SAE)	{
		$OJ_DATA="saestor://data/";
	//  for sae.sina.com.cn
		$mysqli=mysqli_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
		$DB_NAME=SAE_MYSQL_DB;
	}else{
		//for normal install
		if(($mysqli=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS))==null) 
			die('Could not connect: ' . mysqli_error());
	}
	// use db
	mysqli_query($mysqli,"set names utf8");
  //if(!$OJ_SAE)mysqli_set_charset("utf8");
	
	if(!mysqli_select_db($mysqli,$DB_NAME))
		die('Can\'t use foo : ' . mysqli_error());
	//sychronize php and mysql server
	date_default_timezone_set("PRC");
	if(isset($OJ_CSRF)&&$OJ_CSRF&&$OJ_TEMPLATE=="bs3"&&basename($_SERVER['PHP_SELF'])!="problem_judge")
		 require_once('csrf_check.php');
	mysqli_query($mysqli,"SET time_zone ='+8:00'");
	
?>
