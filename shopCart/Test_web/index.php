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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 3;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Student_test, $Student_test);
$query_Recordset1 = "SELECT * FROM students ORDER BY cID ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $Student_test) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<p>
今天日期是
<?php
 echo date('Y-m-d H:i:s');
?>
</p>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0">
  <caption>
    2019年學員通訊錄
    <a href="add_students.php">新增通訊 </a>
  </caption>
  <tr>
    <th width="79" bgcolor="#33CCFF" scope="row">編號</th>
    <td width="96" align="center" bgcolor="#33CCFF">姓名</td>
    <td width="61" align="center" bgcolor="#33CCFF">性別</td>
    <td width="114" align="center" bgcolor="#33CCFF">生日</td>
    <td width="180" align="center" bgcolor="#33CCFF">電子郵件</td>
    <td width="111" align="center" bgcolor="#33CCFF">電話</td>
    <td width="252" align="center" bgcolor="#33CCFF">住址</td>
    <td width="89" align="center" bgcolor="#33CCFF"><p>編輯</p></td>
  </tr>
  <?php do { ?>
    <tr>
      <th scope="row"><?php echo $row_Recordset1['cID']; ?></th>
      <td><?php echo $row_Recordset1['cName']; ?></td>
      <td>
       <img name="" src="<?php
	                      if($row_Recordset1['cSex']=="M"){
							  echo "boy.png";
						  }
						  elseif($row_Recordset1['cSex']=="F"){
							  echo "girl.png";
						  }
						  else {
							  echo $row_Recordset1['cSex'];
						  }
						  ?>" alt="">
      </td>
      <td><?php echo $row_Recordset1['cBirthday']; ?></td>
      <td><?php echo $row_Recordset1['cEmail']; ?></td>
      <td><?php echo $row_Recordset1['cPhone']; ?></td>
      <td><?php echo $row_Recordset1['cAddr']; ?></td>
      <td><a href="md_students.php?cID=<?php echo $row_Recordset1['cID']; ?>">修改</a>/<a href="del_students.php?cID=<?php echo $row_Recordset1['cID']; ?>">刪除</a></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>&nbsp;
<table border="0" align="center">
  <tr>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">第一頁</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">上一頁</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一頁</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">最後一頁</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
