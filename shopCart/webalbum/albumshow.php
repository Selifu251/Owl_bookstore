<?php require_once('Connections/webalbumSQL.php'); ?>
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

$colname_RecAlbum = "-1";
if (isset($_GET['album_id'])) {
  $colname_RecAlbum = $_GET['album_id'];
}
mysql_select_db($database_webalbumSQL, $webalbumSQL);
$query_RecAlbum = sprintf("SELECT * FROM album WHERE album_id = %s", GetSQLValueString($colname_RecAlbum, "int"));
$RecAlbum = mysql_query($query_RecAlbum, $webalbumSQL) or die(mysql_error());
$row_RecAlbum = mysql_fetch_assoc($RecAlbum);
$totalRows_RecAlbum = mysql_num_rows($RecAlbum);

$colname_Recordset1 = "-1";
if (isset($_GET['album_id'])) {
  $colname_Recordset1 = $_GET['album_id'];
}
mysql_select_db($database_webalbumSQL, $webalbumSQL);
$query_Recordset1 = sprintf("SELECT * FROM albumphoto WHERE album_id = %s ORDER BY ap_id DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $webalbumSQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
          <td><div class="subjectDiv"> 標題 <?php echo $row_RecAlbum['album_title']; ?></div>
            <div class="actionDiv">照片總數：0</div>
            <div class="normalDiv">
              <p><strong>拍攝時間</strong>：<?php echo $row_RecAlbum['album_date']; ?> <strong>拍攝地點</strong>：<?php echo $row_RecAlbum['album_location']; ?></p>
              <p>&nbsp;</p>
            </div>
            <?php do { ?>
              <div class="albumDiv">
                <div class="picDiv"><a href="albumphoto.php?album_id=<?php echo $row_Recordset1['album_id']; ?>&ap_id=<?php echo $row_Recordset1['ap_id']; ?>"><img src="photos/<?php echo $row_Recordset1['ap_picurl']; ?>" width="120" height="120" border="0" /></a></a></div>
                <div class="albuminfo"><a href="albumphoto.php?album_id=<?php echo $row_Recordset1['album_id']; ?>&ap_id=<?php echo $row_Recordset1['ap_id']; ?>"><?php echo $row_Recordset1['ap_subject']; ?></a><br />
                  <span class="smalltext">點閱次數：<?php echo $row_Recordset1['ap_hits']; ?></span></div>
              </div>
              <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?></td>
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
mysql_free_result($RecAlbum);

mysql_free_result($Recordset1);
?>
