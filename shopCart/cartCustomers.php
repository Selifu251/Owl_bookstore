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
	     <form action="cartCheckout.php" method="POST" name="form1" onSubmit="YY_checkform('form1','paytype[0]','#q','2','Field \'paytype[0]\' is not valid.','CustomerName','#q','0','請輸入姓名。','CustomerPhone','#q','0','請輸入聯絡電話。','CustomerAddress','#q','0','請輸入住址。','CustomerEmail','#S','2','請輸入電子郵件或檢查郵件格式。');return document.MM_returnValue">
	       <p><strong>客戶資訊</strong></p>
	       <p>請填寫客戶資訊</p>
	       <table width="100%" border="0" cellspacing="0" cellpadding="4">
              <tr class="head3">
                <td width="100" align="center">資訊</td>
                <td>內容</td>
              </tr>
              <tr>
                <td width="100" align="center" bgcolor="#FFFFFF"><strong>姓名</strong></td>
                <td bgcolor="#FFFFFF"><input name="CustomerName" type="text" class="normalinput" id="CustomerName"></td>
              </tr>
              <tr>
                <td width="100" align="center" bgcolor="#FFFFFF"><strong>聯絡電話</strong></td>
                <td bgcolor="#FFFFFF"><input name="CustomerPhone" type="text" class="normalinput" id="CustomerPhone"></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><strong>住址</strong></td>
                <td bgcolor="#FFFFFF"><input name="CustomerAddress" type="text" class="normalinput" id="CustomerAddress" size="40"></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><strong>電子郵件</strong></td>
                <td bgcolor="#FFFFFF"><input name="CustomerEmail" type="text" class="normalinput" id="CustomerEmail"></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><strong>付款方式</strong></td>
                <td bgcolor="#FFFFFF"><input name="paytype" type="radio" value="ATM 轉帳" checked>
ATM 轉帳
  <input name="paytype" type="radio" value="郵政劃撥">
郵政劃撥</td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <table border="0" align="center" cellpadding="4" cellspacing="0">
              <tr>
                <td><input type="button" name="Submit4" value="繼續購物" onclick="window.loation='index.php'"></td>
                <td><input type="button" name="Submit" value="回上一頁" onclick="window.history.back();"></td>
                <td><input type="reset" name="Submit3" value="重新填寫"></td>
                <td><input type="submit" name="Submit2" value="下一步"></td>
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
             <td><img src="images/flow_r2_c1.gif" width="132" height="37"></td>
           </tr>
           <tr>
             <td><img src="images/flow_r3_c1.gif" width="132" height="29"></td>
           </tr>
           <tr>
             <td><img src="images/flow_r2_c1_f4.gif" width="132" height="37"></td>
           </tr>
           <tr>
             <td><img src="images/flow_r5_c1_f2.gif" width="132" height="30"></td>
           </tr>
           <tr>
             <td><img src="images/flow_r2_c1_f3.gif" width="132" height="37"></td>
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
