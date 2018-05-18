<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css">
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>	
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
				<!-- Logo -->
				<div class="topbar">
				<div class="topbar-social">
				<p class="s-text7 w-size27">
					Belanja Sekarang di Apotek Langganan Anda! 
				</div>

				<div class="topbar-child2">
							<li><a href="<?php echo site_url(); ?>/login/logout" >LOGOUT</a></li>
				</div>
			</div>

				
			<div class="wrap_header">
				<a href="<?php echo base_url() ?>index.html" class="logo">
					 <img src="<?php echo base_url() ?>assets/gambar/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="#">Informasi</a>
								<ul class="sub_menu">
									<li><a href="<?php echo base_url() ?>index.html">Tentang Lapak Apotek</a></li>
									<li><a href="<?php echo base_url() ?>home-02.html">Cara Belanja</a></li>
								</ul>
							</li>

							<li>
								<a href="<?php echo base_url() ?>cart.html">Kirim Resep</a>
							</li>

							<li>
								<a href="<?php echo base_url() ?>blog.html">Transaksi</a>
								<ul class="sub_menu">
									<li><a href="<?php echo base_url() ?>index.html">Konfirmasi Pembayaran</a></li>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url() ?>product.html">Daftar Apotek</a>
							</li>

						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<div class="header-wrapicon2">
						<img src="<?php echo base_url() ?>assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url() ?>assets/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?php echo base_url() ?>#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url() ?>assets/images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?php echo base_url() ?>#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url() ?>assets/images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?php echo base_url() ?>#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?php echo base_url() ?>cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?php echo base_url() ?>#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
					<span class="linedivide1"></span>
					<a href="<?php echo base_url() ?>#" class="header-wrapicon1 dis-block">
						<img src="<?php echo base_url() ?>assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="<?php echo base_url() ?>index.html" class="logo-mobile">
				<img src="<?php echo base_url() ?>assets/images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="<?php echo base_url() ?>#" class="header-wrapicon1 dis-block">
						<img src="<?php echo base_url() ?>assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?php echo base_url() ?>assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url() ?>assets/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?php echo base_url() ?>#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url() ?>assets/images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?php echo base_url() ?>#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url() ?>assets/images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?php echo base_url() ?>#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?php echo base_url() ?>cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?php echo base_url() ?>#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="<?php echo base_url() ?>#" class="topbar-social-item fa fa-facebook"></a>
							<a href="<?php echo base_url() ?>#" class="topbar-social-item fa fa-instagram"></a>
							<a href="<?php echo base_url() ?>#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="<?php echo base_url() ?>#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="<?php echo base_url() ?>#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url() ?>index.html">Home</a>
						<ul class="sub-menu">
							<li><a href="<?php echo base_url() ?>index.html">Homepage V1</a></li>
							<li><a href="<?php echo base_url() ?>home-02.html">Homepage V2</a></li>
							<li><a href="<?php echo base_url() ?>home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url() ?>product.html">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url() ?>product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url() ?>cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url() ?>blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url() ?>about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url() ?>contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<?= $content?>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="<?php echo base_url() ?>#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="<?php echo base_url() ?>#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="<?php echo base_url() ?>#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="<?php echo base_url() ?>#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="<?php echo base_url() ?>#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url() ?>#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="<?php echo base_url() ?>#">
				<img class="h-size2" src="<?php echo base_url() ?>assets/images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="<?php echo base_url() ?>#">
				<img class="h-size2" src="<?php echo base_url() ?>assets/images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="<?php echo base_url() ?>#">
				<img class="h-size2" src="<?php echo base_url() ?>assets/images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="<?php echo base_url() ?>#">
				<img class="h-size2" src="<?php echo base_url() ?>assets/images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="<?php echo base_url() ?>#">
				<img class="h-size2" src="<?php echo base_url() ?>assets/images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="<?php echo base_url() ?>https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>

</body>
</html>
