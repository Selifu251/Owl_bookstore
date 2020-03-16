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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO students (cName, cSex, cBirthday, cEmail, cPhone, cAddr) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cName'], "text"),
                       GetSQLValueString($_POST['cSex'], "text"),
                       GetSQLValueString($_POST['cBirthday'], "date"),
                       GetSQLValueString($_POST['cEmail'], "text"),
                       GetSQLValueString($_POST['cPhone'], "text"),
                       GetSQLValueString($_POST['cAddr'], "text"));

  mysql_select_db($database_Student_test, $Student_test);
  $Result1 = mysql_query($insertSQL, $Student_test) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
    <input type="text" name="cName" id="cName">
  </p>
  <p>性別：
    <input name="cSex" type="radio" id="radio" value="boy.png" checked="CHECKED">
    <label for="cSex">男生</label>
    <input type="radio" name="cSex" id="radio2" value="girl.png">
    <label for="cSex">女生</label>
  </p>
  <p>
    <label for="cAddr">住址：</label>
    <input type="text" name="cAddr" id="cAddr">
  </p>
  <p>
    <label for="cPhone">電話：</label>
    <input type="text" name="cPhone" id="cPhone">
  </p>
  <p>
    <label for="cEmail">email：</label>
    <input type="text" name="cEmail" id="cEmail">
  </p>
  <p>
    <label for="cBirthday">生日：</label>
    <input type="text" name="cBirthday" id="cBirthday">
  </p>
  <p class="center-text">
    <input name="button2" type="submit" id="button2" onClick="MM_callJS('javaspript:history.back();')" value="上一頁">
    <input type="submit" name="button" id="button" value="新增資料">
  </p>
  <input type="hidden" name="MM_insert" value="form1">
</form>
</body>
</html>