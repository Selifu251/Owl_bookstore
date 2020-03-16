<?php require_once('Connections/webalbumSQL.php'); ?>
<?php
mysql_select_db($database_webalbumSQL, $webalbumSQL);
$query_Update = "UPDATE albumphoto SET ap_hits=ap_hits+1 WHERE ap_id = ".$_GET["ap_id"];
$Result = mysql_query($query_Update, $webalbumSQL) or die(mysql_error());
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

$colname_Recordset1 = "-1";
if (isset($_GET['album_id'])) {
  $colname_Recordset1 = $_GET['album_id'];
}
mysql_select_db($database_webalbumSQL, $webalbumSQL);
$query_Recordset1 = sprintf("SELECT * FROM album WHERE album_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $webalbumSQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['ap_id'])) {
  $colname_Recordset2 = $_GET['ap_id'];
}
mysql_select_db($database_webalbumSQL, $webalbumSQL);
$query_Recordset2 = sprintf("SELECT * FROM albumphoto WHERE ap_id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $webalbumSQL) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網路相簿</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#cccccc">
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="124" valign="top" background="images/album_r1_c1.jpg"><div class="titleDiv">[生活、旅行的記錄]</div>
      <div class="menulink"><a href="index.php">[相簿首頁]</a> <a href="login.php">[相簿管理]</a></div></td>
  </tr>
  <tr>
    <td background="images/album_r2_c1.jpg"><div id="mainRegion">
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <td><div class="subjectDiv">標題<?php echo $row_Recordset1['album_title']; ?></div>
              <div class="actionDiv"><a href="javascript:window.history.back();">回上一頁</a></div>
              <div class="photoDiv"><img src="photos/<?php echo $row_Recordset2['ap_picurl']; ?>" /></div>
              <div class="normalDiv">
                <p align="center"><?php echo $row_Recordset2['ap_subject']; ?></p>
            </div></td>
          </tr>
        </table>
      </div></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark">&nbsp;</td>
  </tr>
  <tr>
    <td><img name="album_r4_c1" src="images/album_r4_c1.jpg" width="778" height="24" border="0" id="album_r4_c1" alt="" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
