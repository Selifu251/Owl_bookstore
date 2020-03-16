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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
  $updateSQL = sprintf("UPDATE albumphoto SET ap_subject=%s WHERE ap_id=%s",
                       GetSQLValueString($_POST['ap_subject'], "text"),
                       GetSQLValueString($_POST['ap_id'], "int"));

  mysql_select_db($database_webalbumSQL, $webalbumSQL);
  $Result1 = mysql_query($updateSQL, $webalbumSQL) or die(mysql_error());

  $updateGoTo = "adminfix.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_GET['ap_id'])) && ($_GET['ap_id'] != "") && (isset($_GET['delphoto']))) {
  $deleteSQL = sprintf("DELETE FROM albumphoto WHERE ap_id=%s",
                       GetSQLValueString($_GET['ap_id'], "int"));

  mysql_select_db($database_webalbumSQL, $webalbumSQL);
  $Result1 = mysql_query($deleteSQL, $webalbumSQL) or die(mysql_error());

  $deleteGoTo = "adminfix.php?album_id=".$_GET['album_id'];
  
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE album SET album_date=%s, album_location=%s, album_title=%s, album_desc=%s WHERE album_id=%s",
                       GetSQLValueString($_POST['album_date'], "date"),
                       GetSQLValueString($_POST['album_location'], "text"),
                       GetSQLValueString($_POST['album_title'], "text"),
                       GetSQLValueString($_POST['album_desc'], "text"),
                       GetSQLValueString($_POST['album_id'], "int"));

  mysql_select_db($database_webalbumSQL, $webalbumSQL);
  $Result1 = mysql_query($updateSQL, $webalbumSQL) or die(mysql_error());

//一次插入多筆記錄到資料庫
  for($cno=1;$cno<=5;$cno++){
	  if($_POST["ap_picurl".$cno]!=""){
		 $insertSQL = sprintf("INSERT INTO albumphoto (album_id, ap_picurl, ap_subject,ap_date) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['album_id'], "int"),
                       GetSQLValueString($_POST['ap_picurl'.$cno], "text"),
                       GetSQLValueString($_POST['ap_subject'.$cno], "text"),
					   GetSQLValueString($_POST['ap_date'.$cno], "date"));
		 mysql_select_db($database_webalbumSQL, $webalbumSQL);
		 $Result = mysql_query($insertSQL, $webalbumSQL) or die(mysql_error());
	  }
  }


  $updateGoTo = "adminfix.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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

$colname_RecPhoto = "-1";
if (isset($_GET['album_id'])) {
  $colname_RecPhoto = $_GET['album_id'];
}
mysql_select_db($database_webalbumSQL, $webalbumSQL);
$query_RecPhoto = sprintf("SELECT * FROM albumphoto WHERE album_id = %s", GetSQLValueString($colname_RecPhoto, "int"));
$RecPhoto = mysql_query($query_RecPhoto, $webalbumSQL) or die(mysql_error());
$row_RecPhoto = mysql_fetch_assoc($RecPhoto);
$totalRows_RecPhoto = mysql_num_rows($RecPhoto);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網路相簿</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="ajaxupload.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	new AjaxUpload('btn1', {action: 'edupload.php',data: {uploaddir : 'photos/'},onComplete: function(file, response){document.getElementById('ap_picurl1').value=file;}});
});
</script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	new AjaxUpload('btn2', {action: 'edupload.php',data: {uploaddir : 'photos/'},onComplete: function(file, response){document.getElementById('ap_picurl2').value=file;}});
});
</script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	new AjaxUpload('btn3', {action: 'edupload.php',data: {uploaddir : 'photos/'},onComplete: function(file, response){document.getElementById('ap_picurl3').value=file;}});
});
</script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	new AjaxUpload('btn4', {action: 'edupload.php',data: {uploaddir : 'photos/'},onComplete: function(file, response){document.getElementById('ap_picurl4').value=file;}});
});
</script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	new AjaxUpload('btn5', {action: 'edupload.php',data: {uploaddir : 'photos/'},onComplete: function(file, response){document.getElementById('ap_picurl5').value=file;}});
});
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
            <td><div class="subjectDiv"> 網路相簿管理界面-修改相簿資訊</div>
              <div class="actionDiv">相片總數:0</div>
              <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
                <div class="normalDiv">
                  <p class="heading">相簿內容</p>
                  <p>相簿名稱：
                    <input name="album_title" type="text" id="album_title" value="<?php echo $row_RecAlbum['album_title']; ?>" />                                        
                    <input name="album_id" type="hidden" id="album_id" value="<?php echo $row_RecAlbum['album_id']; ?>">
                  </p>
                  <p>拍攝時間：
                    <input name="album_date" type="text" id="album_date" value="<?php echo $row_RecAlbum['album_date']; ?>" />
                    拍攝地點 ：
                    <input name="album_location" type="text" id="album_location" value="<?php echo $row_RecAlbum['album_location']; ?>" />
                  </p>
                  <p>相簿說明：
                    <textarea name="album_desc" id="album_desc" cols="45" rows="5"><?php echo $row_RecAlbum['album_desc']; ?></textarea>
                  </p>
                </div>
                <hr />
                <div class="normalDiv">
                  <p class="heading">新增照片</p>
                  <div class="clear"></div>
                  <p>照片1
                    <input type="text" name="ap_picurl1" id="ap_picurl1">
                    <input name="btn1" type="button" id="btn1" value="上傳" />
說明1：
<input type="text" name="ap_subject1" id="ap_subject1" />
                  <input name="ap_date1" type="hidden" id="ap_date1" value="<?php echo date('Y-m-d H:i:s')?>">
                  </p>
                  <p>照片2
                    
                    <input type="text" name="ap_picurl2" id="ap_picurl2">
                    <input name="btn2" type="button" id="btn2" value="上傳" />
                    說明2：                  
                    <input type="text" name="ap_subject2" id="ap_subject2" />
                    <input name="ap_date2" type="hidden" id="ap_date2" value="<?php echo date('Y-m-d H:i:s')?>">
                  </p>
                  <p>照片3
                    <input type="text" name="ap_picurl3" id="ap_picurl3">
                    <input name="btn3" type="button" id="btn3" value="上傳" />
說明3：                  
<input type="text" name="ap_subject3" id="ap_subject3" />
                  <input name="ap_date3" type="hidden" id="ap_date3" value="<?php echo date('Y-m-d H:i:s')?>">
                  </p>
                  <p>照片4
                    
                    <input type="text" name="ap_picurl4" id="ap_picurl4">
                    <input name="btn4" type="button" id="btn4" value="上傳" />
                    說明4：                  
                    <input type="text" name="ap_subject4" id="ap_subject4" />
                    <input name="ap_date4" type="hidden" id="ap_date4" value="<?php echo date('Y-m-d H:i:s')?>">
                  </p>
                  <p>照片5
                    
                    <input type="text" name="ap_picurl5" id="ap_picurl5">
                    <input name="btn5" type="button" id="btn5" value="上傳" />
                    說明5：                  
                    <input type="text" name="ap_subject5" id="ap_subject5" />
                    <input name="hiddenField5" type="hidden" id="hiddenField5" value="<?php echo date('Y-m-d H:i:s')?>">
                  </p>
                  <p>&nbsp;</p>
                  <p>
                    <input type="submit" name="button" id="button" value="更新及上傳資料" />
                  </p>
                </div>
                <input type="hidden" name="MM_update" value="form1">
              </form>
              <hr />
              <?php if ($totalRows_RecPhoto > 0) { // Show if recordset not empty ?>
  <div class="normalDiv">
    <p class="heading">管理照片</p>
    <?php do { ?>
      <div class="albumDiv">
        <div class="picDiv"><img src="photos/<?php echo $row_RecPhoto['ap_picurl']; ?>" width="120" height="120" border="0" /></div>
        <div class="albuminfo">
          <form action="<?php echo $editFormAction; ?>" method="POST" name="form3" id="form3">
            <input name="ap_id" type="hidden" id="ap_id" value="<?php echo $row_RecPhoto['ap_id']; ?>">
            <input name="ap_subject" type="text" id="ap_subject" value="<?php echo $row_RecPhoto['ap_subject']; ?>" size="10" />
            <input type="submit" name="button3" id="button3" value="更新">
            <br>
            <a href="adminfix.php?delphoto=true&album_id=<?php echo $row_RecPhoto['album_id']; ?>&ap_id=<?php echo $row_RecPhoto['ap_id']; ?>&ap_picurl=<?php echo $row_RecPhoto['ap_picurl']; ?>">刪除圖片</a>
            <input type="hidden" name="MM_update" value="form3">
            </form>
          <p><br />
            </p>
          </div>
      </div>
      <?php } while ($row_RecPhoto = mysql_fetch_assoc($RecPhoto)); ?>
  </div>
  <?php } // Show if recordset not empty ?>            </td>
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

mysql_free_result($RecPhoto);
?>
