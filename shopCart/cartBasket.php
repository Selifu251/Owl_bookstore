<?php
//�[�J�ʪ���Class���ŧi
require_once('cart/EDcart.php');
session_start();
$cart =& $_SESSION['edCart']; 
if(!is_object($cart)) $cart = new edCart(); 
?>

<?php
$cart->deliverfee = 100; //�г]�w�ʪ������B�O
?>

<?php
//�ʪ������Ůɭ��s�ɦV���w��
if ($cart->itemcount == 0){
	header("Location:index.php?errMsg=1");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>´�ڽu�W�ʪ���</title>
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
	   <td class="mainbg"><h1><font color="#FF6600">�u�W�ʪ� - ���O���q���]</font></h1>
	     <form action="addtocart.php" method="get" name="form1">
	       
	       <table width="100%" border="0" cellpadding="4" cellspacing="0">
	         <tr bgcolor="#00CCFF" class="head3">
	           <td width="30" align="center">����</td>
	           <td align="left">�ӫ~�W��</td>
	           <td width="80" align="center">���</td>
	           <td width="80" align="center">�ƶq</td>
	           <td width="100" align="center">���B</td>
	           </tr>
               <?php
if($cart->itemcount > 0) {
	foreach($cart->get_contents() as $item) {
?>
	         <tr>
	           <td align="center" bgcolor="#FFFFFF"><a href="addtocart.php?A=Remove&prono=<?php echo $item['id'];?>">�R�� </a><a></a><a href="#"></a></td>
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
	           <td colspan="4" align="left" bgcolor="#FFFFFF" class="upline"><strong>�p�p</strong></td>
	           <td align="center" bgcolor="#FFFFFF" class="upline"> $ <?php echo $cart->total;?></td>
	           </tr>
	         <tr>
	           <td colspan="4" align="left" bgcolor="#FFFFFF" class="upline"><strong>�B�O</strong> (�T�w�B�O 100 ��) </td>
	           <td width="100" align="center" bgcolor="#FFFFFF" class="upline">$ <?php echo $cart->deliverfee;?></td>
	           </tr>
	         <tr>
	           <td colspan="4" align="left" bgcolor="#FFFFFF" class="downline"><strong>�`�p</strong></td>
	           <td align="center" bgcolor="#FFFFFF" class="downline"><strong><font color="#FF0000">$ <?php echo $cart->grandtotal;?></font></strong></td>
	           </tr>
	         </table>

<p>&nbsp;</p>
            <table border="0" align="center" cellpadding="4" cellspacing="0">
              <tr>
                <td><input type="button" name="Submit" value="�~���ʪ�" onclick="window.location='index.php';MM_callJS('javascript:history.back();')"></td>
                <td><input name="Submit" type="submit" id="Submit" value="��s�ʪ���">
                  <input name="A" type="hidden" id="A" value="Update">
                  <input name="itemcount" type="hidden" id="itemcount" value="<?php echo $cart->itemcount;?>"></td>
                <td><input name="Submit" type="button" id="Submit" onclick="window.location='addtocart.php?A=Empty'" value="�M���ʪ���"></td>
                <td><input name="Submit" type="button" id="Submit" onclick="window.location='cartCustomers.php'" value="�ڭn���b"></td>
              </tr>
            </table>
	        
         </form>
	     <p>&nbsp;</p>
	     <ul>
	       <li>�Y�z�n����ʶR�ƶq�A�ήֿ�u���������ӫ~�v�ɡA�������U�u��s�ʪ����v�s�A�H���s�p��X���T���B�I</li>
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
