<?php
//加入購物車Class的宣告
require_once('cart/EDcart.php');
session_start();
$cart =& $_SESSION['edCart']; 
if(!is_object($cart)) $cart = new edCart(); 
?>

<?php
$cart->deliverfee = 100; //請設定購物車的運費
?>

<?php
//購物車為空時重新導向指定頁
if ($cart->itemcount == 0){
	header("Location:index.php?errMsg=1");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>織夢線上購物網</title>
<meta http-equiv="Content-Type" content="text/html;">
<!--Fireworks 8 Dreamweaver 8 target.  Created Sat Jul 22 16:15:20 GMT+0800 2006-->
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
</script>
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
	     <form action="addtocart.php" method="get" name="form1">
	       
	       <table width="100%" border="0" cellpadding="4" cellspacing="0">
	         <tr bgcolor="#00CCFF" class="head3">
	           <td width="30" align="center">取消</td>
	           <td align="left">商品名稱</td>
	           <td width="80" align="center">單價</td>
	           <td width="80" align="center">數量</td>
	           <td width="100" align="center">金額</td>
	           </tr>
               <?php
if($cart->itemcount > 0) {
	foreach($cart->get_contents() as $item) {
?>
	         <tr>
	           <td align="center" bgcolor="#FFFFFF"><a href="addtocart.php?A=Remove&prono=<?php echo $item['id'];?>">刪除 </a><a></a><a href="#"></a></td>
	           <td align="left" bgcolor="#FFFFFF"><input name="itemid[]" type="hidden" id="itemid[]" value="<?php echo $item['id'];?>">
	             <?php echo $item['info'];?></td>
	           <td width="80" align="center" bgcolor="#FFFFFF">$ <?php echo $item['price'];?></td>
	           <td width="80" align="center" bgcolor="#FFFFFF"><input name="qty[]" type="text" id="qty[]" size="2" value="<?php echo $item['qty'];?>"></td>
	           <td width="100" align="center" bgcolor="#FFFFFF"><strong>$ <?php echo $item['subtotal'];?></strong></td>
	           </tr>
               <?php
	}
}
?>
	         <tr>
	           <td colspan="4" align="left" bgcolor="#FFFFFF" class="upline"><strong>小計</strong></td>
	           <td align="center" bgcolor="#FFFFFF" class="upline"> $ <?php echo $cart->total;?></td>
	           </tr>
	         <tr>
	           <td colspan="4" align="left" bgcolor="#FFFFFF" class="upline"><strong>運費</strong> (固定運費 100 元) </td>
	           <td width="100" align="center" bgcolor="#FFFFFF" class="upline">$ <?php echo $cart->deliverfee;?></td>
	           </tr>
	         <tr>
	           <td colspan="4" align="left" bgcolor="#FFFFFF" class="downline"><strong>總計</strong></td>
	           <td align="center" bgcolor="#FFFFFF" class="downline"><strong><font color="#FF0000">$ <?php echo $cart->grandtotal;?></font></strong></td>
	           </tr>
	         </table>

<p>&nbsp;</p>
            <table border="0" align="center" cellpadding="4" cellspacing="0">
              <tr>
                <td><input type="button" name="Submit" value="繼續購物" onclick="window.location='index.php';MM_callJS('javascript:history.back();')"></td>
                <td><input name="Submit" type="submit" id="Submit" value="更新購物車">
                  <input name="A" type="hidden" id="A" value="Update">
                  <input name="itemcount" type="hidden" id="itemcount" value="<?php echo $cart->itemcount;?>"></td>
                <td><input name="Submit" type="button" id="Submit" onclick="window.location='addtocart.php?A=Empty'" value="清空購物車"></td>
                <td><input name="Submit" type="button" id="Submit" onclick="window.location='cartCustomers.php'" value="我要結帳"></td>
              </tr>
            </table>
	        
         </form>
	     <p>&nbsp;</p>
	     <ul>
	       <li>若您要更改購買數量，或核選「取消此項商品」時，必須按下「更新購物車」鈕，以重新計算出正確金額！</li>
          </ul></td>
	   <td width="140" align="center"><p><a href="cartBasket.php"><img src="images/shopbasket.gif" width="132" height="24" border="0"></a></p>
	     <p><a href="orderCheck.php"><img src="images/shopOrder.gif" width="132" height="24" border="0"></a></p>
	     <table width="132" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr>
           <td><img src="images/flow_r1_c1.gif" width="132" height="47"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r2_c1_f4.gif" width="132" height="37"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r3_c1_f2.gif" width="132" height="29"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r2_c1_f3.gif" width="132" height="37"></td>
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
