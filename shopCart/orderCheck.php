<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>織夢線上購物網</title>
<meta http-equiv="Content-Type" content="text/html;">
<!--Fireworks 8 Dreamweaver 8 target.  Created Sat Jul 22 16:15:20 GMT+0800 2006-->
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function YY_checkform() { //v4.65
//copyright (c)1998,2002 Yaromat.com
  var args = YY_checkform.arguments; var myDot=true; var myV=''; var myErr='';var addErr=false;var myReq;
  for (var i=1; i<args.length;i=i+4){
    if (args[i+1].charAt(0)=='#'){myReq=true; args[i+1]=args[i+1].substring(1);}else{myReq=false}
    var myObj = MM_findObj(args[i].replace(/\[\d+\]/ig,""));
    myV=myObj.value;
    if (myObj.type=='text'||myObj.type=='password'||myObj.type=='hidden'){
      if (myReq&&myObj.value.length==0){addErr=true}
      if ((myV.length>0)&&(args[i+2]==1)){ //fromto
        var myMa=args[i+1].split('_');if(isNaN(parseInt(myV))||myV<myMa[0]/1||myV > myMa[1]/1){addErr=true}
      } else if ((myV.length>0)&&(args[i+2]==2)){
          var rx=new RegExp("^[\\w\.=-]+@[\\w\\.-]+\\.[a-z]{2,4}$");if(!rx.test(myV))addErr=true;
      } else if ((myV.length>0)&&(args[i+2]==3)){ // date
        var myMa=args[i+1].split("#"); var myAt=myV.match(myMa[0]);
        if(myAt){
          var myD=(myAt[myMa[1]])?myAt[myMa[1]]:1; var myM=myAt[myMa[2]]-1; var myY=myAt[myMa[3]];
          var myDate=new Date(myY,myM,myD);
          if(myDate.getFullYear()!=myY||myDate.getDate()!=myD||myDate.getMonth()!=myM){addErr=true};
        }else{addErr=true}
      } else if ((myV.length>0)&&(args[i+2]==4)){ // time
        var myMa=args[i+1].split("#"); var myAt=myV.match(myMa[0]);if(!myAt){addErr=true}
      } else if (myV.length>0&&args[i+2]==5){ // check this 2
            var myObj1 = MM_findObj(args[i+1].replace(/\[\d+\]/ig,""));
            if(myObj1.length)myObj1=myObj1[args[i+1].replace(/(.*\[)|(\].*)/ig,"")];
            if(!myObj1.checked){addErr=true}
      } else if (myV.length>0&&args[i+2]==6){ // the same
            var myObj1 = MM_findObj(args[i+1]);
            if(myV!=myObj1.value){addErr=true}
      }
    } else
    if (!myObj.type&&myObj.length>0&&myObj[0].type=='radio'){
          var myTest = args[i].match(/(.*)\[(\d+)\].*/i);
          var myObj1=(myObj.length>1)?myObj[myTest[2]]:myObj;
      if (args[i+2]==1&&myObj1&&myObj1.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
      if (args[i+2]==2){
        var myDot=false;
        for(var j=0;j<myObj.length;j++){myDot=myDot||myObj[j].checked}
        if(!myDot){myErr+='* ' +args[i+3]+'\n'}
      }
    } else if (myObj.type=='checkbox'){
      if(args[i+2]==1&&myObj.checked==false){addErr=true}
      if(args[i+2]==2&&myObj.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
    } else if (myObj.type=='select-one'||myObj.type=='select-multiple'){
      if(args[i+2]==1&&myObj.selectedIndex/1==0){addErr=true}
    }else if (myObj.type=='textarea'){
      if(myV.length<args[i+1]){addErr=true}
    }
    if (addErr){myErr+='* '+args[i+3]+'\n'; addErr=false}
  }
  if (myErr!=''){alert('The required information is incomplete or contains errors:\t\t\t\t\t\n\n'+myErr)}
  document.MM_returnValue = (myErr=='');
}
//-->
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
	       
            <p><strong>請輸入查詢訂單資料</strong></p>
            <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF" class="blackbox">
              <tr class="head2">
                <td>資訊</td>
              </tr>
              <tr>
                <td align="center"><p> 請您輸入查詢訂單的相關資訊。對不起，資料庫中並沒相關的資訊，請重新輸入。 </p></td>
              </tr>
            </table>
            <form action="orderCheck.php" method="get" name="form1" onSubmit="YY_checkform('form1','OrderID','#q','0','請輸入訂單編號。','CustomerEmail','#S','2','請輸入電子郵件。');return document.MM_returnValue">
              <table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
                <tr>
                  <td width="60">訂單編號</td>
                  <td><input name="OrderID" type="text" class="normalinput" id="OrderID" size="10"></td>
                  <td width="90">客戶電子郵件</td>
                  <td><input name="CustomerEmail" type="text" class="normalinput" id="CustomerEmail"></td>
                  <td><input type="submit" name="Submit3" value="送出"></td>
                </tr>
              </table>
            </form>
			
			
			<p>&nbsp;</p>
			<p><strong>訂單編號：<font color="#FF0000"></font></strong></p>
		   <table width="100%" border="0" cellpadding="4" cellspacing="0">
             <tr class="head3">
               <td align="center" bgcolor="#FFFFFF">商品名稱</td>
               <td width="80" align="center" bgcolor="#FFFFFF">單價</td>
               <td width="80" align="center" bgcolor="#FFFFFF">數量</td>
               <td width="150" align="center" bgcolor="#FFFFFF">金額</td>
             </tr>
             <tr>
               <td align="left" bgcolor="#FFFFFF"></td>
               <td width="80" align="center" bgcolor="#FFFFFF">$ </td>
               <td width="80" align="center" bgcolor="#FFFFFF"></td>
               <td width="150" align="center" bgcolor="#FFFFFF"><strong>$ </strong></td>
             </tr>
             <tr>
               <td colspan="3" align="left" bgcolor="#FFFFFF" class="upline"><strong>小計</strong></td>
               <td width="150" align="center" bgcolor="#FFFFFF" class="upline"><strong>$ </strong></td>
             </tr>
             <tr>
               <td colspan="3" align="left" bgcolor="#FFFFFF" class="upline"><strong>運費</strong> (固定運費 100 元) </td>
               <td width="150" align="center" bgcolor="#FFFFFF" class="upline"><strong>$ </strong></td>
             </tr>
             <tr>
               <td colspan="3" align="left" bgcolor="#FFFFFF" class="downline"><strong>總計</strong></td>
               <td width="150" align="center" bgcolor="#FFFFFF" class="downline"><strong><font color="#FF0000">$ </font></strong></td>
             </tr>
           </table>
		   <br>
           <br>
           <p><strong>客戶資訊</strong></p>
           <table width="100%" border="0" cellspacing="0" cellpadding="4">
             <tr class="head3">
               <td width="100" align="center">資訊</td>
               <td>內容</td>
             </tr>
             <tr>
               <td width="100" align="center" bgcolor="#FFFFFF"><strong>姓名</strong></td>
               <td bgcolor="#FFFFFF"></td>
             </tr>
             <tr>
               <td width="100" align="center" bgcolor="#FFFFFF"><strong>聯絡電話</strong></td>
               <td bgcolor="#FFFFFF"></td>
             </tr>
             <tr>
               <td align="center" bgcolor="#FFFFFF"><strong>住址</strong></td>
               <td bgcolor="#FFFFFF"></td>
             </tr>
             <tr>
               <td align="center" bgcolor="#FFFFFF"><strong>電子郵件</strong></td>
               <td bgcolor="#FFFFFF"></td>
             </tr>
             <tr>
               <td align="center" bgcolor="#FFFFFF"><strong>付款方式</strong></td>
               <td bgcolor="#FFFFFF"></td>
             </tr>
           </table>
           <hr size="1" noshade>
         <table border="0" align="center" cellpadding="4" cellspacing="0">
           <tr>
             <td><input type="button" name="Submit" value="回到首頁" onclick="window.location='index.php'"></td>
           </tr>
         </table>
         <p>&nbsp;</p></td>
	   <td width="140" align="center"><p><a href="cartBasket.php"><img src="images/shopbasket.gif" width="132" height="24" border="0"></a></p>
	     <p><a href="orderCheck.php"><img src="images/shopOrder.gif" width="132" height="24" border="0"></a></p>
	     <table width="132" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr>
           <td><img src="images/flow_r1_c1.gif" width="132" height="47"></td>
         </tr>
         <tr>
           <td><img src="images/flow_r2_c1.gif" width="132" height="37"></td>
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