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

$colname_Recordset1 = "-1";
if (isset($_GET['productid'])) {
  $colname_Recordset1 = $_GET['productid'];
}
mysql_select_db($database_mystoreSQL, $mystoreSQL);
$query_Recordset1 = sprintf("SELECT * FROM product WHERE productid = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $mystoreSQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
	     <table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
         <tr valign="top">
<td width="180" align="center" bgcolor="#FFFFFF"><p class="smalltext"><img src="product_images/<?php echo $row_Recordset1['productimages']; ?>" width="135" height="135"><br>
  <br>
  <a href="addtocart.php?A=Add&price=<?php echo $row_Recordset1['productprice']; ?>&prono=<?php echo $row_Recordset1['productid']; ?>&name=<?php echo $row_Recordset1['productname']; ?>"><img src="images/shoppingcart.gif" width="97" height="23" border="0"></a></p></td>
  
              <td bgcolor="#FFFFFF"><p><strong>產品名稱</strong><?php echo $row_Recordset1['productname']; ?></p>
                <p class="smalltext"></p>
                <p><strong>產品介紹</strong></p>
                <p><?php echo $row_Recordset1['description']; ?></p>
                <p class="smalltext"></p>
                <p><strong>產品價格</strong><?php echo $row_Recordset1['productprice']; ?></p>
                <p class="smalltext">特價：<strong><font color="#FF0000"></font></strong></p>
                <p>&nbsp;</p>
                <p align="center">
                  <input type="button" name="Submit" value="回上一頁" onclick="window.history.back();">
                </p></td>
         </tr>
       </table>	     
	     
         
         </td>
	   <td width="140" align="center">         <p><a href="cartBasket.php"><img src="images/shopbasket.gif" width="132" height="24" border="0"></a></p>
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
