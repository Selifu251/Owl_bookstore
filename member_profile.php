<?php require_once('Connections/owl_bookstore.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['MM_Nickname'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['MM_Nickname']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "member_signin.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "member,admin";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "member_signin.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
 if(!isset($_SESSION)){
	 session_start();
 }
?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "owl_member_profile")) {
	if($_POST['ou_password_1']!=""){
		$updateSQL = sprintf("UPDATE owl_user SET ou_password=%s,ou_name=%s, ou_nickname=%s, ou_email=%s, ou_cellphone=%s, ou_address=%s WHERE ou_id=%s",
                       GetSQLValueString(md5($_POST['ou_password_1']), "text"),
					   GetSQLValueString($_POST['ou_name'], "text"),
                       GetSQLValueString($_POST['ou_nickname'], "text"),
                       GetSQLValueString($_POST['ou_email'], "text"),
                       GetSQLValueString($_POST['ou_cellphone'], "text"),
                       GetSQLValueString($_POST['ou_address'], "text"),
                       GetSQLValueString($_POST['ou_id'], "int"));
	}else{
		$updateSQL = sprintf("UPDATE owl_user SET ou_name=%s, ou_nickname=%s, ou_email=%s, ou_cellphone=%s, ou_address=%s WHERE ou_id=%s",
                       GetSQLValueString($_POST['ou_name'], "text"),
                       GetSQLValueString($_POST['ou_nickname'], "text"),
                       GetSQLValueString($_POST['ou_email'], "text"),
                       GetSQLValueString($_POST['ou_cellphone'], "text"),
                       GetSQLValueString($_POST['ou_address'], "text"),
                       GetSQLValueString($_POST['ou_id'], "int"));
	}
  

  mysql_select_db($database_owl_bookstore, $owl_bookstore);
  $Result1 = mysql_query($updateSQL, $owl_bookstore) or die(mysql_error());

  $updateGoTo = "member_profile.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_owl_bookstore, $owl_bookstore);
$query_Recordset1 = sprintf("SELECT * FROM owl_user WHERE ou_username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $owl_bookstore) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php $_SESSION['MM_Nickname']=$row_Recordset1['ou_nickname']; ?>
<?php /* 判斷是否為使用者 */
 $member_sign=1;
 if($row_Recordset1['ou_level']=='admin'){
	 $member_sign=0;
 }
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zh-TW">

<head>
	<title>貓頭鷹書房：會員登入</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<!--<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">-->
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p>歡迎光臨貓頭鷹書房</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.php">貓頭鷹書房<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!--// header-bot -->
            <!-- header -->
			<div class="col-md-8 header">
                  <!-- header lists -->
                  <ul>
                    <li><span class="fa fa-phone" aria-hidden="true"></span> 06 7895425 </li>
                    <li class="bg-success"><?php echo $_SESSION['MM_Nickname']; ?></li>
                  </ul>
                  <!-- //header lists -->
                  <!-- search 書籍搜索 -->
                  <div class="agileits_search">
                      <form action="#" method="post">
                          <input name="Search" type="search" placeholder="搜尋書籍" required>
                          <button type="submit" class="btn btn-default" aria-label="Left Align">
                              <span class="fa fa-search" aria-hidden="true"> </span>
                          </button>
                      </form>
                  </div>
                  <!-- //search 書籍搜索 -->
                  <!-- cart details 購物車 -->
                  <div class="top_nav_right">
                      <h3></h3>
                  </div>
                  <!-- //cart details 購物車 -->
                  <div class="clearfix"></div>
              </div>
            <!-- // header -->
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
            <!-- 書籍分類選項 -->
			<div class="agileits-navi_search">
				<form action="#" method="post">
					<select id="agileinfo-nav_search" name="agileinfo_search" required="">
						<option value="">書籍分類</option>
                        <option value="">文學</option>
                        <option value="">旅遊</option>
                        <option value="">財經</option>
                        <option value="">人文</option>
                        <option value="">自然</option>
                        <option value="">教育</option>
                        <option value="">小說</option>
					</select>
				</form>
			</div>
            <!-- // 書籍分類選項 -->
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li>
									<a class="nav-stylehead" href="index.php">首頁</a>
								</li>
								<li>
									<a class="nav-stylehead" href="about.php">關於我們</a>
								</li>
								<li>
									<a class="nav-stylehead" href="message.php">留言專區</a>
                                </li>
								<li class="active">
                                	<a class="nav-stylehead" href="javascript:;">會員專區</a>
							    </li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">首頁</a>
						<i>|</i>
					</li>
					<li>會員資料</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- about signin -->
    <div class="container">
     <!-- 左半邊 會員專區 -->
     <div class="col-md-3">
      <?php if($member_sign==1){ ?>
      <!-- 會員專區 -->
      <div class="panel panel-info" style="margin-top:20px;">
       <div class="panel-heading">
        <h4 class="h4">會員專區</h4>
       </div>
       <ul class="list-group">
        <a href="javascript:;"><li class="list-group-item active">會員資料</li></a>
        <a href="member_shop.php"><li class="list-group-item">購物車</li></a>
       </ul>
       <div class="panel-footer">
        <a href="<?php echo $logoutAction ?>" class="btn btn-danger">登出</a>
       </div>
      </div>
      <!-- // 會員專區 -->
      <?php }else{ ?>
      <!-- 管理者介面 -->
      <div class="panel panel-default">
       <div class="panel-heading">
        使用者介面
       </div>
       <!-- PanelList -->
       <div class="list-group">
        <a href="javascript:;" class="list-group-item active">管理者資料</a>
        <a href="admin_member.php" class="list-group-item">帳戶管理</a>
        <a href="admin_book.php" class="list-group-item">書籍管理</a>
        <a href="admin_news_top.php" class="list-group-item">最新消息</a>
        <a href="admin_hotbook.html" class="list-group-item">熱門書籍</a>
       </div>
       <!-- // PanelList -->
       <div class="panel-footer">
        <a href="<?php echo $logoutAction ?>" class="btn btn-danger">登出</a>
       </div>
      </div>
      <!-- // 管理者介面 -->
      <?php } ?>
     </div>
     
     <!-- // 左半邊 會員專區 -->
     <!-- 右半邊 會員資料 -->
     <div class="col-md-8">
      <table class="table bg-info">
      <form method="POST" action="<?php echo $editFormAction; ?>" id="owl_member_profile" name="owl_member_profile">
       <tr style="background-color:#6CF">
        <td class="text-center" colspan="2"><h3>會員資料</h3></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">帳號：</td>
        <td class="col-md-10"><?php echo $row_Recordset1['ou_username']; ?></td>
       </tr>
       <tr>
        <td class="text-right">更改密碼：</td>
        <td><input type="password" name="ou_password_1" id="ou_password_1"></td>
       </tr>
       <tr>
        <td class="text-right">確認密碼：</td>
        <td><input type="password" name="ou_password_2" id="ou_password_2"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">姓名：</td>
        <td class="col-md-10"><input name="ou_name" type="text" class="form-control" id="ou_name" value="<?php echo $row_Recordset1['ou_name']; ?>"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">暱稱：</td>
        <td class="col-md-10"><input name="ou_nickname" type="text" class="form-control" id="ou_nickname" value="<?php echo $row_Recordset1['ou_nickname']; ?>"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">E-mail：</td>
        <td class="col-md-10"><input name="ou_email" type="email" class="form-control" id="ou_email" value="<?php echo $row_Recordset1['ou_email']; ?>"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">手機號碼：</td>
        <td class="col-md-10"><input name="ou_cellphone" type="text" class="form-control" id="ou_cellphone" value="<?php echo $row_Recordset1['ou_cellphone']; ?>"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">地址：</td>
        <td class="col-md-10"><input name="ou_address" type="text" class="form-control" id="ou_address" value="<?php echo $row_Recordset1['ou_address']; ?>"></td>
       </tr>
       <tr>
        <td></td>
        <td class="text-center"><input class="btn btn-success" type="submit" name="Submit" value="修改資料">
          <input name="ou_id" type="hidden" id="ou_id" value="<?php echo $row_Recordset1['ou_id']; ?>"></td>
       </tr>
       <input type="hidden" name="MM_update" value="owl_member_profile">
      </form>
      </table>
     </div>
     <!-- // 右半邊 會員資料 -->
</div>
	<!-- //about signin -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<!-- //footer first section -->
			
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>分類</h3>
						<ul>
							<li>
								<a href="product.html">文學</a>
							</li>
							<li>
								<a href="product.html">財經</a>
							</li>
							<li>
								<a href="product.html">教育</a>
							</li>
							<li>
								<a href="product2.html">旅遊</a>
							</li>
							<li>
								<a href="product.html">小說</a>
							</li>
							<li>
								<a href="product2.html">其他</a>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>相關連結</h3>
						<ul>
							<li><a href="#">關於我們</a></li>
                            <li><a href="#">應徵工作</a></li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids">
						<h3>聯繫方式</h3>
						<ul>
							<li>
								<i class="fa fa-map-marker"></i> 123 台南市, 台灣.</li>
							<li>
								<i class="fa fa-mobile"></i> 0998 999 999 </li>
							<li>
								<i class="fa fa-phone"></i> +06 7895425</li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:example@mail.com"> nomail@uuusss.com</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-2 footer-grids  w3l-socialmk">
					<h3>關注我們</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="icon tw" href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="agileits_app-devices">
						<h5>Download the App</h5>
						<a href="#">
							<img src="images/1.png" alt="">
						</a>
						<a href="#">
							<img src="images/2.png" alt="">
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //social icons -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
			<!-- footer fourth section (text) -->
			<div class="agile-sometext">
				<div class="sub-some">
					<h5>線上購書平台</h5>
					<p>網上訂購，所有您最喜歡的書籍迅速訂購，方便迅速，價格優惠，有缺必補。</p>
				</div>
				<div class="sub-some">
					<h5>目前線上特價優惠</h5>
					<p>熱門書籍一律8折起，會員一律5折起，本月壽星可免運費。旅遊相關書籍目前訂購就附贈店長簽名，現在下載APP還能想更多想不到的優惠。</p>
				</div>
				<!-- payment -->
				<div class="sub-some child-momu">
					<h5>Payment Method</h5>
					<ul>
						<li>
							<img src="images/pay2.png" alt="">
						</li>
						<li>
							<img src="images/pay5.png" alt="">
						</li>
						<li>
							<img src="images/pay1.png" alt="">
						</li>
						<li>
							<img src="images/pay4.png" alt="">
						</li>
						<li>
							<img src="images/pay6.png" alt="">
						</li>
						<li>
							<img src="images/pay3.png" alt="">
						</li>
						<li>
							<img src="images/pay7.png" alt="">
						</li>
						<li>
							<img src="images/pay8.png" alt="">
						</li>
						<li>
							<img src="images/pay9.png" alt="">
						</li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
			<!-- //footer fourth section (text) -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>2019 貓頭鷹書房｜市話：(06)7895425｜手機：0998999999｜E-mail：nomail@uuusss.com
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->
    
    <!-- 確認密碼 -->
    <script>
	 $(document).ready(function() {
		 $('#owl_member_profile').submit(function(e){
			 if($('#ou_password_1').val()!=$('#ou_password_2').val()){
				 alert('密碼錯誤');
				 return false;
			 }
		 });
	 });
    </script>
    <!-- // 確認密碼 -->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>
<?php
mysql_free_result($Recordset1);
?>
