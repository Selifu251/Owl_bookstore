<?php require_once('Connections/mystoreSQL.php'); ?>
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

$maxRows_Recordset1 = 6;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_mystoreSQL, $mystoreSQL);
$query_Recordset1 = "SELECT * FROM product ORDER BY productid DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $mystoreSQL) or die(mysql_error());
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>織夢線上購物網</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<!--Fireworks 8 Dreamweaver 8 target.  Created Sat Jul 22 16:15:20 GMT+0800 2006-->
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#0066ff">
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
<!-- fwtable fwsrc="dwshop.png" fwbase="shopCart.jpg" fwstyle="Dreamweaver" fwdocid = "705028150" fwnested="1" -->
  <tr>
   <td><img name="shopCart_r1_c1" src="images/shopCart_r1_c1.jpg" width="720" height="101" border="0" alt=""></td>
  </tr>
  <tr>
   <td background="images/shopCart_r3_c1.jpg"><table align="left" border="0" cellpadding="20" cellspacing="0" width="720">
	  <tr valign="top">
	   <td class="mainbg"><h1><font color="#FF6600">線上購物 - 筆記型電腦館</font></h1>
	     
	       
	         <?php /*start inputVar script*/ if (isset($_GET['errMsg'])){ ?>
	           <table width="92%" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF" class="blackbox">
	             <tr class="head2">
	               <td>資訊</td>
                 </tr>
	             <tr>
	               <td align="center"><p> 您的購物車是空的！ </p></td>
                 </tr>
               </table>
	           <?php } /*end inputVar script*/ ?>
	         <p>&nbsp;</p>
	       <table border="0" align="center" cellpadding="4" cellspacing="2">
         <tr>          
         <?php $cot=0 ?> 
           <?php do { ?>
             <td width="145" align="center" bgcolor="#FFFFFF"><p class="smalltext"><a href="product.php?productid=<?php echo $row_Recordset1['productid']; ?>"><img src="product_images/<?php echo $row_Recordset1['productimages']; ?>" alt="產品詳細資料" width="135" height="135" border="0"></a><br>
               <?php echo $row_Recordset1['productname']; ?><br>
               特價 <strong><font color="#FF0000"></font></strong><?php echo $row_Recordset1['productprice']; ?>元<br>
               <a href="addtocart.php?A=Add&price=<?php echo $row_Recordset1['productprice']; ?>&prono=<?php echo $row_Recordset1['productid']; ?>&name=<?php echo $row_Recordset1['productname']; ?>"><img src="images/shoppingcart.gif" width="97" height="23" border="0"></a> </p></td>
               <?php $cot++; if($cot%3==0){ echo "</tr><tr>"; }?>
             <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
           
         </tr>
       </table>	     
	     
         
         <hr size="1" noshade>
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
         </table></td>
	   <td width="140" align="center"><p><a href="cartBasket.php"><img src="images/shopbasket.gif" width="132" height="24" border="0"></a></p>
	     <p><a href="orderCheck.php"><img src="images/shopOrder.gif" width="132" height="24" border="0"></a></p>
	     <table width="132" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr>
           <td><img src="images/flow_r1_c1_f2.gif" width="132" height="47"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r2_c1_f3.gif" width="132" height="37"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r3_c1.gif" width="132" height="29"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r2_c1.gif" width="132" height="37"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r5_c1.gif" width="132" height="30"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r2_c1.gif" width="132" height="37"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r7_c1.gif" width="132" height="49"></td>
         </tr>
       </table></td>
	  </tr>
	</table></td>
  </tr>
  <tr>
   <td><img name="shopCart_r5_c1" src="images/shopCart_r5_c1.jpg" width="720" height="56" border="0" alt=""></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
