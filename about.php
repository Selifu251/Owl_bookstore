<?php session_start(); ?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zh-TW">

<head>
	<title>貓頭鷹書房：關於我們</title>
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
                  <!-- header lists 會員登入 註冊 -->
                  <ul>
                    <li><span class="fa fa-phone" aria-hidden="true"></span> 06 7895425 </li>
                    <?php if(!isset($_SESSION['MM_Username'])){ ?>
                      <li>
                          <a href="member_signin.php">
                              <span class="fa fa-unlock-alt" aria-hidden="true"></span> 會員登入 </a>
                      </li>
                      <li>
                          <a href="member_signup.php">
                              <span class="fa fa-pencil-square-o" aria-hidden="true"></span> 會員註冊 </a>
                      </li>
                    <?php }else{ ?>
                      <li class="bg-success"><?php echo $_SESSION['MM_Nickname']; ?></li>
                    <?php } ?>
                  </ul>
                  <!-- //header lists 會員登入 註冊 -->
                  <!-- search 書籍搜索 -->
                  <div class="agileits_search">
                      <form action="product.php" method="post">
                          <input name="Search" type="search" placeholder="搜尋書籍">
                          <button type="submit" class="btn btn-default" aria-label="Left Align">
                              <span class="fa fa-search" aria-hidden="true"> </span>
                          </button>
                      </form>
                  </div>
                  <!-- //search 書籍搜索 -->
                  
                  <div class="clearfix"></div>
              </div>
            <!-- // header -->
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- signin Model 會員登入 -->
      <!-- Modal1 -->
      <div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body modal-body-sub_agile">
                      <div class="main-mailposi">
                          <span class="fa fa-envelope-o" aria-hidden="true"></span>
                      </div>
                      <div class="modal_body_left modal_body_left1">
                          <h3 class="agileinfo_sign">會員登入</h3>
                          <p>
                              還沒加入會員？現在馬上註冊
                              <a href="#" data-toggle="modal" data-target="#myModal2">
                                  會員註冊</a>
                          </p>
                          <form action="#" method="post">
                              <div class="styled-input agile-styled-input-top">
                                  <input type="text" placeholder="帳號" name="Name" required>
                              </div>
                              <div class="styled-input">
                                  <input type="password" placeholder="密碼" name="password" required>
                              </div>
                              <input type="submit" value="登入">
                          </form>
                          <div class="clearfix"></div>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <!-- //Modal content-->
          </div>
      </div>
      <!-- //Modal1 -->
    <!-- //signin Model 會員登入 -->
    <!-- signup Model 會員註冊 -->
      <!-- Modal2 -->
      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body modal-body-sub_agile">
                      <div class="main-mailposi">
                          <span class="fa fa-envelope-o" aria-hidden="true"></span>
                      </div>
                      <div class="modal_body_left modal_body_left1">
                          <h3 class="agileinfo_sign">會員註冊</h3>
                          <p>
                              快點加入貓頭鷹書房
                          </p>
                          <form action="#" method="post">
                              <div class="styled-input agile-styled-input-top">
                                  <input type="text" placeholder="帳號" name="Name" required>
                              </div>
                              <div class="styled-input">
                                  <input type="email" placeholder="E-mail" name="Email" required>
                              </div>
                              <div class="styled-input">
                                  <input type="password" placeholder="密碼" name="password" id="password1" required>
                              </div>
                              <div class="styled-input">
                                  <input type="password" placeholder="確認密碼" name="Confirm Password" id="password2" required>
                              </div>
                              <input type="submit" value="會員註冊">
                          </form>
                          <p>
                              <a href="#">點擊觀看註冊條款</a>
                          </p>
                      </div>
                  </div>
              </div>
              <!-- //Modal content-->
          </div>
      </div>
      <!-- //Modal2 -->
    <!-- //signup Model 會員註冊 -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<!-- 書籍主要分類 -->
			<div class="agileits-navi_search">
				<form action="#" method="post">
					<select id="agileinfo-nav_search" name="agileinfo_search" required="">
						<option value="">書籍分類</option>
						<option value="">中文書</option>
						<option value="">英文書</option> 
					</select>
				</form>
			</div>
            <!-- // 書籍主要分類 -->
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
								<li class="active">
									<a class="nav-stylehead" href="javascript:;">關於我們</a>
								</li>
								<li>
									<a class="nav-stylehead" href="message.php">留言專區</a>
                                </li>
								<li>
                                	<a class="nav-stylehead" href="member_signin.php">會員專區</a>
							    </li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">首頁</a>
						<i>|</i>
					</li>
					<li>關於我們</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- about page -->
	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">歡迎來到貓頭鷹書房網站
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="w3l-welcome-info">
				<div class="col-sm-6 col-xs-6 welcome-grids">
					<div class="welcome-img">
						<img src="images/about.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="col-sm-6 col-xs-6 welcome-grids">
					<div class="welcome-img">
						<img src="images/about2.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
            <!-- 關於我們內容 -->
			<div class="w3l-welcome-text">
				<p>貓頭鷹書房為1999創建至今，從原本的店面逐漸改成線在的網路購書平台。
                此處目前藏書5萬套，並持續更新中
                貓頭鷹書房為1999創建至今，從原本的店面逐漸改成線在的網路購書平台。
                此處目前藏書5萬套，並持續更新中貓頭鷹書房為1999創建至今，從原本的店面逐漸改成線在的網路購書平台。
                此處目前藏書5萬套，並持續更新中貓頭鷹書房為1999創建至今，從原本的店面逐漸改成線在的網路購書平台。
                此處目前藏書5萬套，並持續更新中貓頭鷹書房為1999創建至今，從原本的店面逐漸改成線在的網路購書平台。
                此處目前藏書5萬套，並持續更新中</p>
			</div>
            <!-- 關於我們內容 -->
		</div>
	</div>
	<!-- //welcome -->
	
	<!-- //about page -->
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
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<!-- 空白 -->
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