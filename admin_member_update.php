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
$MM_authorizedUsers = "admin";
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
		$updateSQL = sprintf("UPDATE owl_user SET ou_password=%s, ou_name=%s, ou_nickname=%s, ou_email=%s, ou_cellphone=%s, ou_address=%s WHERE ou_id=%s",
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

  $updateGoTo = "admin_member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_RecMember = "-1";
if (isset($_GET['ou_id'])) {
  $colname_RecMember = $_GET['ou_id'];
}
mysql_select_db($database_owl_bookstore, $owl_bookstore);
$query_RecMember = sprintf("SELECT * FROM owl_user WHERE ou_id = %s", GetSQLValueString($colname_RecMember, "int"));
$RecMember = mysql_query($query_RecMember, $owl_bookstore) or die(mysql_error());
$row_RecMember = mysql_fetch_assoc($RecMember);
$totalRows_RecMember = mysql_num_rows($RecMember);
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
	<title>貓頭鷹書房：使用者介面-帳戶管理</title>
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
					<a href="javascript:;">貓頭鷹書房<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!--// header-bot -->
			<div class="clearfix"></div>
		</div>
	</div>
    <!-- // header-bot-->
    <!-- 使用者介面 -->
    <div class="container">
     <!-- container-left -->
     <div class="col-md-3">
      <div class="panel panel-default">
       <div class="panel-heading">
        使用者介面
       </div>
       <!-- PanelList -->
       <div class="list-group">
        <a href="member_profile.php" class="list-group-item">管理者資料</a>
        <a href="admin_member.php" class="list-group-item active">帳戶管理</a>
        <a href="admin_book.php" class="list-group-item">書籍資料</a>
        <a href="admin_news_top.php" class="list-group-item">最新消息</a>
        <a href="admin_hotbook.html" class="list-group-item">熱門書籍</a>
       </div>
       <!-- // PanelList -->
       <div class="panel-footer">
        <a href="<?php echo $logoutAction ?>" class="btn btn-danger">登出</a>
       </div>
      </div>
     </div>
     <!-- // container-left -->
     <!-- container-right -->
     <div class="col-md-8">
      <!-- 會員資料修改 -->
      <table class="table bg-info">
      <form action="<?php echo $editFormAction; ?>" method="POST" id="owl_member_profile" name="owl_member_profile">
       <tr style="background-color:#6CF">
        <td class="text-center" colspan="2"><h3>會員資料修改</h3></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">帳號：</td>
        <td class="col-md-10"><?php echo $row_RecMember['ou_username']; ?></td>
       </tr>
       <tr>
        <td class="text-right">更改密碼：</td>
        <td><input name="ou_password_1" id="ou_password_1"></td>
       </tr>
       <tr>
        <td class="text-right">確認密碼：</td>
        <td><input name="ou_password_2" id="ou_password_2"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">姓名：</td>
        <td class="col-md-10"><input name="ou_name" type="text" class="form-control" id="ou_name" value="<?php echo $row_RecMember['ou_name']; ?>"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">暱稱：</td>
        <td class="col-md-10"><input name="ou_nickname" type="text" class="form-control" id="ou_nickname" value="<?php echo $row_RecMember['ou_nickname']; ?>"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">E-mail：</td>
        <td class="col-md-10"><input name="ou_email" type="email" class="form-control" id="ou_email" value="<?php echo $row_RecMember['ou_email']; ?>"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">手機號碼：</td>
        <td class="col-md-10"><input name="ou_cellphone" type="text" class="form-control" id="ou_cellphone" value="<?php echo $row_RecMember['ou_cellphone']; ?>"></td>
       </tr>
       <tr>
        <td class="col-md-2 text-right">地址：</td>
        <td class="col-md-10"><input name="ou_address" type="text" class="form-control" id="ou_address" value="<?php echo $row_RecMember['ou_address']; ?>"></td>
       </tr>
       <tr>
        <td></td>
        <td class="text-center"><input class="btn btn-success" type="submit" name="Submit" value="修改資料">
          <input name="ou_id" type="hidden" id="ou_id" value="<?php echo $row_RecMember['ou_id']; ?>"></td>
       </tr>
       <input type="hidden" name="MM_update" value="owl_member_profile">
      </form>
      </table>
      <!-- 會員資料修改 -->
     </div>
     <!-- container-right -->
    </div>
    <!-- // 使用者介面 -->
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
mysql_free_result($RecMember);
?>
