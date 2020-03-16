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

if ((isset($_GET['album_id'])) && ($_GET['album_id'] != "") && (isset($_GET['delbum']))) {
  $deleteSQL = sprintf("DELETE FROM album WHERE album_id=%s",
                       GetSQLValueString($_GET['album_id'], "int"));

  mysql_select_db($database_webalbumSQL, $webalbumSQL);
  $Result1 = mysql_query($deleteSQL, $webalbumSQL) or die(mysql_error());

  $deleteGoTo = "admin.php";
  
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_webalbumSQL, $webalbumSQL);
$query_Recordset1 = "SELECT album.album_id, album.album_date, album.album_location, album.album_title, album.album_desc, (albumphoto.ap_picurl) AS album_photo, COUNT(albumphoto.ap_id) AS album_total FROM album INNER JOIN albumphoto ON album.album_id = albumphoto.album_id GROUP BY album.album_id, album.album_date, album.album_location, album.album_title, album.album_desc ORDER BY album.album_date DESC";
$Recordset1 = mysql_query($query_Recordset1, $webalbumSQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網路相簿</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function tfm_confirmLink(message) { //v1.0
	if(message == "") message = "Ok to continue?";	
	document.MM_returnValue = confirm(message);
}
</script>
</head>
<body bgcolor="#cccccc">
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td height="124" valign="top" background="images/album_r1_c1.jpg"><div class="titleDiv"> [生活、旅行的記錄]<br />
   </div>
    <div class="menulink"><a href="admin.php">[管理首頁]</a> <a href="?logout=true">[登出系統]</a></div></td>
  </tr>
  <tr>
    <td background="images/album_r2_c1.jpg"><div id="mainRegion">
      <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
        <tr>
          <td><div class="subjectDiv"> 網路相簿管理界面 </div>
            <div class="actionDiv">相簿總數: 0，<a href="adminadd.php">新增相簿</a></div>  
            <div class="normaldesc"></div>
            <?php do { ?>
              <div class="albumDiv">
                <div class="picDiv">
                  <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
                    <img src="images/nopic.png" alt="暫無圖片" width="120" height="120" border="0" /><?php }else{ ?><img src="photos/<?php echo $row_Recordset1['album_photo']; ?>" width="120" height="120" border="0" />
                    <?php } // Show if recordset empty ?>
                </div>
                <div class="albuminfo"><a href="adminfix.php?album_id=<?php echo $row_Recordset1['album_id']; ?>"><?php echo $row_Recordset1['album_title']; ?></a><br />
                  <span class="smalltext">共 <?php echo $row_Recordset1['album_total']; ?> 張</span><br>
                  <a href="admin.php?album_id=<?php echo $row_Recordset1['album_id']; ?>&delbum=true" class="smalltext" onClick="tfm_confirmLink('確定是否刪除此相簿?????');return document.MM_returnValue">(刪除相簿)</a><br>
                </div>
              </div>
              <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
            <div class="navDiv"></div></td>
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
?>
