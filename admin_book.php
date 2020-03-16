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

if ((isset($_GET['ob_id'])) && ($_GET['ob_id'] != "") && (isset($_GET['ob_Delete']))) {
  $deleteSQL = sprintf("DELETE FROM owl_book WHERE ob_id=%s",
                       GetSQLValueString($_GET['ob_id'], "text"));

  mysql_select_db($database_owl_bookstore, $owl_bookstore);
  $Result1 = mysql_query($deleteSQL, $owl_bookstore) or die(mysql_error());

  $deleteGoTo = "admin_book.php";
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_owl_bookstore, $owl_bookstore);
$query_Recordset1 = "SELECT * FROM owl_book ORDER BY ob_id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $owl_bookstore) or die(mysql_error());
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
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zh-TW">

<head>
	<title>貓頭鷹書房：使用者介面-書籍管理</title>
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
        <a href="admin_member.php" class="list-group-item">帳戶管理</a>
        <a href="javascript:;" class="list-group-item active">書籍管理</a>
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
        書籍管理
        <a href="admin_book_add.php" class="btn btn-success">新增</a>
       </div>
       <table class="table">
        <tr class="bg-info">
         <th class="col-md-5">書名</th>
         <th>作者</th>
         <th>出版日期</th>
         <th></th>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['ob_name']; ?></td>
            <td><?php echo $row_Recordset1['ob_author']; ?></td>
            <td><?php echo $row_Recordset1['ob_publication_day']; ?></td>
            <td><a href="admin_book_update.php?ob_id=<?php echo $row_Recordset1['ob_id']; ?>">[修改]</a><br /><a href="#" data-id="<?php echo $row_Recordset1['ob_id']; ?>" data-toggle="modal" data-target="#del_Modal">[刪除]</a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
       </table>
      </div>
      <!-- 帳戶管理 -->
      <!-- 刪除提醒 -->
      <div class="modal fade" id="del_Modal" tabindex="-1" role="dialog" aria-labelledby="del_ModalLabel">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header text-center bg-danger">
          <h4 class="h4">***請問確認刪除此帳戶嗎?***</h4> 
         </div>
         <div class="modal-body text-center">
          <a class="btn btn-danger" id="delbook" href="#">確認刪除</a>
         </div>
        </div>
       </div>
      </div>
      <!-- // 刪除提醒 -->
      <!-- 換頁 -->
      <div align="center">
        <table border="0">
          <tr class="center-block">
            <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                <a class="btn btn-primary" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">第一頁</a>
                <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                <a class="btn btn-success" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">上一頁</a>
                <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                <a class="btn btn-success" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一頁</a>
                <?php } // Show if not last page ?></td>
            <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                <a class="btn btn-primary" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">最後一頁</a>
                <?php } // Show if not last page ?></td>
          </tr>
        </table>
      </div>
      <!-- // 換頁 -->
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
		 modal.find('#delbook').attr('href','admin_book.php?ob_id='+modalId+'&ob_Delete=true');
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
mysql_free_result($Recordset1);
?>
