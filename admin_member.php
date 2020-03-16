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

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_GET['ou_id'])) && ($_GET['ou_id'] != "") && (isset($_GET['ou_Delete']))) {
  $deleteSQL = sprintf("DELETE FROM owl_user WHERE ou_id=%s",
                       GetSQLValueString($_GET['ou_id'], "int"));

  mysql_select_db($database_owl_bookstore, $owl_bookstore);
  $Result1 = mysql_query($deleteSQL, $owl_bookstore) or die(mysql_error());

  $deleteGoTo = "admin_member.php";
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_RecMember = 10;
$pageNum_RecMember = 0;
if (isset($_GET['pageNum_RecMember'])) {
  $pageNum_RecMember = $_GET['pageNum_RecMember'];
}
$startRow_RecMember = $pageNum_RecMember * $maxRows_RecMember;

mysql_select_db($database_owl_bookstore, $owl_bookstore);
$query_RecMember = "SELECT * FROM owl_user where ou_id!=1 ORDER BY ou_id DESC";
$query_limit_RecMember = sprintf("%s LIMIT %d, %d", $query_RecMember, $startRow_RecMember, $maxRows_RecMember);
$RecMember = mysql_query($query_limit_RecMember, $owl_bookstore) or die(mysql_error());
$row_RecMember = mysql_fetch_assoc($RecMember);

if (isset($_GET['totalRows_RecMember'])) {
  $totalRows_RecMember = $_GET['totalRows_RecMember'];
} else {
  $all_RecMember = mysql_query($query_RecMember);
  $totalRows_RecMember = mysql_num_rows($all_RecMember);
}
$totalPages_RecMember = ceil($totalRows_RecMember/$maxRows_RecMember)-1;

$queryString_RecMember = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RecMember") == false && 
        stristr($param, "totalRows_RecMember") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RecMember = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RecMember = sprintf("&totalRows_RecMember=%d%s", $totalRows_RecMember, $queryString_RecMember);
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
        <a href="javascript:;" class="list-group-item active">帳戶管理</a>
        <a href="admin_book.php" class="list-group-item">書籍管理</a>
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
      <!-- 帳戶管理 -->
      <div class="panel panel-default">
       <div class="panel-heading">
        帳戶管理
       </div>
       <table class="table">
        <tr class="bg-info">
         <th>姓名</th>
         <th>暱稱</th>
         <th>帳號</th>
         <th></th>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_RecMember['ou_name']; ?></td>
            <td><?php echo $row_RecMember['ou_nickname']; ?></td>
            <td><?php echo $row_RecMember['ou_username']; ?></td>
            <td>
             <a href="admin_member_update.php?ou_id=<?php echo $row_RecMember['ou_id']; ?>">[修改]</a>
             /
             <a href="#" data-id="<?php echo $row_RecMember['ou_id']; ?>" data-toggle="modal" data-target="#del_Modal">[刪除]</a>
            </td>
          </tr>
          <?php } while ($row_RecMember = mysql_fetch_assoc($RecMember)); ?>
       </table>
       <!-- <a href="admin_member.php?ou_id=<?/*php echo $row_RecMember['ou_id'];*/ ?>&ou_Delete=true"> -->
      </div>
      <!-- // 帳戶管理 -->
      <!-- 換頁 -->
      <div align="center">
        <table border="0">
          <tr>
            <td><?php if ($pageNum_RecMember > 0) { // Show if not first page ?>
                <a class="btn btn-primary" href="<?php printf("%s?pageNum_RecMember=%d%s", $currentPage, 0, $queryString_RecMember); ?>">第一頁</a>
                <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_RecMember > 0) { // Show if not first page ?>
                <a class="btn btn-success" href="<?php printf("%s?pageNum_RecMember=%d%s", $currentPage, max(0, $pageNum_RecMember - 1), $queryString_RecMember); ?>">上一頁</a>
                <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_RecMember < $totalPages_RecMember) { // Show if not last page ?>
                <a class="btn btn-success" href="<?php printf("%s?pageNum_RecMember=%d%s", $currentPage, min($totalPages_RecMember, $pageNum_RecMember + 1), $queryString_RecMember); ?>">下一頁</a>
                <?php } // Show if not last page ?></td>
            <td><?php if ($pageNum_RecMember < $totalPages_RecMember) { // Show if not last page ?>
                <a class="btn btn-primary" href="<?php printf("%s?pageNum_RecMember=%d%s", $currentPage, $totalPages_RecMember, $queryString_RecMember); ?>">最後一頁</a>
                <?php } // Show if not last page ?></td>
          </tr>
        </table>
      </div>
      <!-- // 換頁 -->
      <!-- 刪除提醒 -->
      <div class="modal fade" id="del_Modal" tabindex="-1" role="dialog" aria-labelledby="del_ModalLabel">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header text-center bg-danger">
          <h4 class="h4">***請問確認刪除此帳戶嗎?***</h4> 
         </div>
         <div class="modal-body text-center">
          <a class="btn btn-danger" id="del_real" href="#">確認刪除</a>
         </div>
        </div>
       </div>
      </div>
      <!-- // 刪除提醒 -->
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
    
    <!-- Modal傳值 確認帳號刪除 -->
    <script>
	 $('#del_Modal').on('show.bs.modal',function(event){
		 var btnThis=$(event.relatedTarget);
		 var modal=$(this);
		 var modalId=btnThis.data('id');
		 modal.find('.content').val(modalId);
		 modal.find('#del_real').attr('href','admin_member.php?ou_id='+modalId+'&ou_Delete=true');
	 });
	</script>    
    <!-- Modal傳值 確認帳號刪除 -->

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
