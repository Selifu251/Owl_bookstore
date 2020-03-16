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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO album (album_date, album_location, album_title, album_desc) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['album_date'], "date"),
                       GetSQLValueString($_POST['album_location'], "text"),
                       GetSQLValueString($_POST['album_title'], "text"),
                       GetSQLValueString($_POST['album_desc'], "text"));

  mysql_select_db($database_webalbumSQL, $webalbumSQL);
  $Result1 = mysql_query($insertSQL, $webalbumSQL) or die(mysql_error());

$maxid = mysql_insert_id();

  $insertGoTo = "adminfix.php?album_id=".$maxid;
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
    <td height="124" valign="top" background="images/album_r1_c1.jpg"><div class="titleDiv"> [生活、旅行的記錄]<br />
      </div>
      <div class="menulink"><a href="admin.php">[管理首頁]</a> <a href="?logout=true">[登出系統]</a></div></td>
  </tr>
  <tr>
    <td background="images/album_r2_c1.jpg"><div id="mainRegion">
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <td><div class="subjectDiv"> 網路相簿管理界面-相增相簿</div>
              <div class="actionDiv"><a href="#" onClick="window.history.back();">回上一頁</a></div>
              <div class="normalDiv">
                <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
                  <p>相簿名稱：
                    <input type="text" name="album_title" id="album_title" />
                  </p>
                  <p>拍攝時間：
                    <input name="album_date" type="text" id="album_date" />
                    拍攝地點 ：
                    <input type="text" name="album_location" id="album_location" />
                  </p>
                  <p>相簿說明：
                    <textarea name="album_desc" id="album_desc" cols="45" rows="5"></textarea>
                  </p>
                  <p>&nbsp;</p>
                  <p>
                    <input type="submit" name="button" id="button" value="確定新增" />
                    <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();" />
                  </p>
                  <input type="hidden" name="MM_insert" value="form1">
                </form>
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
