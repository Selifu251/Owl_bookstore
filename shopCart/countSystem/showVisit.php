<?php require_once('Connections/counterSQL.php'); ?>
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

mysql_select_db($database_counterSQL, $counterSQL);
$query_Recordset1 = "SELECT * FROM webcount ORDER BY count_ip DESC";
$Recordset1 = mysql_query($query_Recordset1, $counterSQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$query_Recordset1 = "SELECT * FROM webcount ORDER BY count_id DESC";
$Recordset1 = mysql_query($query_Recordset1, $counterSQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<title>最近 10 筆訪客資料</title>
<style type="text/css">
<!--
p {
	font-size: 10pt;
	line-height: 120%;
	margin-bottom: 10px;
}
tr td {
	font-size: 10pt;
	line-height: 120%;
}
.head {
	line-height: 24px;
	background-image: url(images/headback1.jpg);
	background-repeat: repeat-x;
	font-size: 10pt;
	font-weight: bold;
	color: #FFFFFF;
	font-family: "新細明體";
}
-->
</style>
</head>

<body bgcolor="#F0F0F0">
<p>網站瀏覽總人數： ，最後記錄時間為：<?php echo $row_Recordset1['count_time']; ?>。<br />
以下為最近 10 筆訪客資料：</p>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#000000">
  <tr bgcolor="#0066CC">
    <td height="24"><font color="#FFFFFF">訪客 IP </font></td>
    <td height="24"><font color="#FFFFFF">訪客登入時間</font></td>
  </tr>
  <tr>
    <td height="24" bgcolor="#FFFFFF"><?php echo $row_Recordset1['count_ip']; ?></td>
    <td height="24" bgcolor="#FFFFFF"><?php echo $row_Recordset1['count_time']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
