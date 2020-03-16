<?php require_once('Connections/Student_test.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE students SET cName=%s, cSex=%s, cBirthday=%s, cEmail=%s, cPhone=%s, cAddr=%s WHERE cID=%s",
                       GetSQLValueString($_POST['cName'], "text"),
                       GetSQLValueString($_POST['cSex'], "text"),
                       GetSQLValueString($_POST['cBirthday'], "date"),
                       GetSQLValueString($_POST['cEmail'], "text"),
                       GetSQLValueString($_POST['cPhone'], "text"),
                       GetSQLValueString($_POST['cAddr'], "text"),
                       GetSQLValueString($_POST['cID'], "int"));

  mysql_select_db($database_Student_test, $Student_test);
  $Result1 = mysql_query($updateSQL, $Student_test) or die(mysql_error());

  $updateGoTo = "index.php?cID=" . $row_Recordset1['cID'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['cID'])) {
  $colname_Recordset1 = $_GET['cID'];
}
mysql_select_db($database_Student_test, $Student_test);
$query_Recordset1 = sprintf("SELECT * FROM students WHERE cID = %s ORDER BY cID ASC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $Student_test) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style type="text/css">
#form1 {
	width: 600px;
	margin-right: auto;
	margin-left: auto;
}
.center-text {
	text-align: center;
}
</style>
<script type="text/javascript">
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
</script>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
  <p>
    <label for="cName">姓名：</label>
    <input name="cName" type="text" id="cName" value="<?php echo $row_Recordset1['cName']; ?>">
    <input name="cID" type="hidden" id="cID" value="<?php echo $row_Recordset1['cID']; ?>">
  </p>
  <p>性別：
    <input <?php if (!(strcmp($row_Recordset1['cSex'],"boy.png"))) {echo "checked=\"checked\"";} ?> name="cSex" type="radio" id="radio" value="boy.png" checked="CHECKED">
    <label for="cSex">男生</label>
    <input <?php if (!(strcmp($row_Recordset1['cSex'],"girl.png"))) {echo "checked=\"checked\"";} ?> type="radio" name="cSex" id="radio2" value="girl.png">
    <label for="cSex">女生</label>
  </p>
  <p>
    <label for="cAddr">住址：</label>
    <input name="cAddr" type="text" id="cAddr" value="<?php echo $row_Recordset1['cAddr']; ?>">
  </p>
  <p>
    <label for="cPhone">電話：</label>
    <input name="cPhone" type="text" id="cPhone" value="<?php echo $row_Recordset1['cPhone']; ?>">
  </p>
  <p>
    <label for="cEmail">email：</label>
    <input name="cEmail" type="text" id="cEmail" value="<?php echo $row_Recordset1['cEmail']; ?>">
  </p>
  <p>
    <label for="cBirthday">生日：</label>
    <input name="cBirthday" type="text" id="cBirthday" value="<?php echo $row_Recordset1['cBirthday']; ?>">
  </p>
  <p class="center-text">
    <input name="button2" type="button" id="button2" onClick="MM_callJS('javascript:history.back();')" value="上一頁">
    <input type="submit" name="button" id="button" value="修改資料">
  </p>
  <input type="hidden" name="MM_update" value="form1">
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
