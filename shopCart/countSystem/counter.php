<?php require_once('Connections/counterSQL.php'); ?>

<?php
$nowtime=date("Y-m-d H:i:s"); 					//設定代表目前時間的變數
/*session_start();*/ 								//啟動Session的使用
if(!isset($_SESSION['Counter'])){ 				//檢查Session值是否存在
	mysql_select_db($database_connSQL, $counterSQL);	//連結資料庫
	$userIP=$_SERVER['REMOTE_ADDR']; 			//收集瀏覽者的IP
	$insertCommand="INSERT INTO webcount (count_id, count_ip,count_time) 
		VALUES (NULL, '$userIP', '$nowtime')"; 	//新增資料的SQL字串
	mysql_query($insertCommand,$counterSQL); 	//執行webcount資料庫的新增
	$_SESSION['Counter'] = 1;  					//設定Session值
}
?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$cToday_ReCTODAY = date("Y-m-d");




mysql_select_db($database_counterSQL, $counterSQL);
$query_ReCTODAY = sprintf("SELECT * FROM webcount WHERE count_time LIKE %s", GetSQLValueString($cToday_ReCTODAY . "%", "text"));
$ReCTODAY = mysql_query($query_ReCTODAY, $counterSQL) or die(mysql_error());
$row_ReCTODAY = mysql_fetch_assoc($ReCTODAY);
$totalRows_ReCTODAY = mysql_num_rows($ReCTODAY);

$cThisMonth_RecThisMonth = date("Y-m");

mysql_select_db($database_counterSQL, $counterSQL);
$query_RecThisMonth = sprintf("SELECT * FROM webcount WHERE count_time LIKE %s", GetSQLValueString($cThisMonth_RecThisMonth . "%", "text"));
$RecThisMonth = mysql_query($query_RecThisMonth, $counterSQL) or die(mysql_error());
$row_RecThisMonth = mysql_fetch_assoc($RecThisMonth);
$totalRows_RecThisMonth = mysql_num_rows($RecThisMonth);

$cThisYear_RecThisYear = date("Y");

mysql_select_db($database_counterSQL, $counterSQL);
$query_RecThisYear = sprintf("SELECT * FROM webcount WHERE count_time LIKE %s", GetSQLValueString($cThisYear_RecThisYear . "%", "text"));
$RecThisYear = mysql_query($query_RecThisYear, $counterSQL) or die(mysql_error());
$row_RecThisYear = mysql_fetch_assoc($RecThisYear);
$totalRows_RecThisYear = mysql_num_rows($RecThisYear);

mysql_select_db($database_counterSQL, $counterSQL);
$query_RecTotal = "SELECT * FROM webcount";
$RecTotal = mysql_query($query_RecTotal, $counterSQL) or die(mysql_error());
$row_RecTotal = mysql_fetch_assoc($RecTotal);
$totalRows_RecTotal = mysql_num_rows($RecTotal);

$timesec=gettimeofday();
$tmp=file("time.txt");
if ($tmp[0]==""){
  $fopen0=fopen("time.txt","w+");
  fputs($fopen0,$timesec["sec"]);
  fclose($fopen0);
  $fopen1=fopen("ip.txt","w+");
  fputs($fopen1,"");
  fclose($fopen1);
}
$tmp1=file("time.txt");
$equal=($timesec["sec"]-$tmp1[0]);
if ($equal>60){
  $fopen0=fopen("time.txt","w+");
  fputs($fopen0,"");
  fclose($fopen0); 
}
$fopen=fopen("ip.txt","a+");
$ip=$_SERVER['REMOTE_ADDR'];
$flag=1;
$tmp2=file("ip.txt");
$con=count($tmp2);
for ($i=0;$i<$con;$i++){
  if ($ip."\n"==$tmp2[$i]){
    $flag=0;
    break;
  }
}
if ($flag==1){
  $ipstring=$ip."\n";
  fputs($fopen,$ipstring);
}
fclose($fopen);
$tmp3=file("ip.txt");
$onlineusr=count($tmp3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="30;URL=" />
<meta content="text/html; charset=big5" />
<title>巴黎文化之旅</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
p {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 10pt;
	color: #003399;
	margin: 0px;
}
.redNum {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<script type="text/JavaScript">
<!--
function centerWindow(theURL,winName,width,height,features) {
//織夢平台 http://www.e-dreamer.idv.tw
//分享是成長的開始
    var window_width = width;
    var window_height = height;
    var edfeatures= features;
    var window_top = (screen.height-window_height)/2;
    var window_left = (screen.width-window_width)/2;
    newWindow=window.open(''+ theURL + '',''+ winName + '','width=' + window_width + ',height=' + window_height + ',top=' + window_top + ',left=' + window_left + ',features=' + edfeatures + '');
    newWindow.focus();
}
//-->
</script>
</head>

<body>
<p align="center">
  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','620','height','400','src','paris','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','paris' ); //end AC code
</script>
<noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="620" height="400">
    <param name="movie" value="paris.swf" />
    <param name="quality" value="high" />
    <embed src="paris.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="620" height="400"></embed>
  </object></noscript>
</p>
<p align="center">瀏覽人次：今年<span class="redNum"></span> <?php echo $totalRows_RecThisYear ?> 人，
本月<?php echo $totalRows_RecThisMonth ?> <span class="redNum"></span> 人，今天<?php echo $totalRows_ReCTODAY ?> <span class="redNum"></span> 人 ，總人次 <span class="redNum"></span> <?php echo $totalRows_RecTotal ?> 人，目前線上人數為<?php echo $onlineusr;?>。 &lt;<a href="javascript:;" onclick="centerWindow('showVisit.php','showVisit','400','360','')">最新瀏覽者資料</a>&gt; </p>
</body>
</html>
<?php
mysql_free_result($ReCTODAY);

mysql_free_result($RecThisMonth);

mysql_free_result($RecThisYear);

mysql_free_result($RecTotal);
?>
