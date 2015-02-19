<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @since ATOM 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="images/favicon.ico">

		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

<?php
wp_head();
?>
</head>

	<!-- body classes: 
			"boxed": boxed layout mode e.g. <body class="boxed">
			"pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> 
	-->
	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="page-wrapper">

			<!-- header-top start (Add "dark" class to .header-top in order to enable dark header-top e.g <div class="header-top dark">) -->
			<!-- ================ -->
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-xs-2  col-sm-6">

							<!-- header-top-first start -->
							<!-- ================ -->
							<div class="header-top-first clearfix">
								<ul class="social-links clearfix hidden-xs">
									<li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
									<li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
									<li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
									<li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
									<li class="youtube"><a target="_blank" href="http://www.youtube.com/"><i class="fa fa-youtube-play"></i></a></li>
									<li class="flickr"><a target="_blank" href="http://www.flickr.com/"><i class="fa fa-flickr"></i></a></li>
									<li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
									<li class="pinterest"><a target="_blank" href="http://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
								</ul>
								<div class="social-links hidden-lg hidden-md hidden-sm">
									<div class="btn-group dropdown">
										<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
										<ul class="dropdown-menu dropdown-animation">
											<li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
											<li class="skype"><a target="_blank" href="http://www.skype.com/"><i class="fa fa-skype"></i></a></li>
											<li class="linkedin"><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
											<li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
											<li class="youtube"><a target="_blank" href="http://www.youtube.com/"><i class="fa fa-youtube-play"></i></a></li>
											<li class="flickr"><a target="_blank" href="http://www.flickr.com/"><i class="fa fa-flickr"></i></a></li>
											<li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
											<li class="pinterest"><a target="_blank" href="http://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- header-top-first end -->

						</div>
						<div class="col-xs-10 col-sm-6">

							<!-- header-top-second start -->
							<!-- ================ -->
							<div id="header-top-second"  class="clearfix">

								<!-- header top dropdowns start -->
								<!-- ================ -->
								<div class="header-top-dropdown">
									<div class="btn-group dropdown">
										<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> Search</button>
										<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
											<li>
												<form role="search" class="search-box">
													<div class="form-group has-feedback">
														<input type="text" class="form-control" placeholder="Search">
														<i class="fa fa-search form-control-feedback"></i>
													</div>
												</form>
											</li>
										</ul>
									</div>
									<div class="btn-group dropdown">
										<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login</button>
										<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
											<li>
												<form class="login-form">
													<div class="form-group has-feedback">
														<label class="control-label">Username</label>
														<input type="text" class="form-control" placeholder="">
														<i class="fa fa-user form-control-feedback"></i>
													</div>
													<div class="form-group has-feedback">
														<label class="control-label">Password</label>
														<input type="password" class="form-control" placeholder="">
														<i class="fa fa-lock form-control-feedback"></i>
													</div>
													<button type="submit" class="btn btn-group btn-dark btn-sm">Log In</button>
													<span>or</span>
													<button type="submit" class="btn btn-group btn-default btn-sm">Sing Up</button>
													<ul>
														<li><a href="#">Forgot your password?</a></li>
													</ul>
													<div class="divider"></div>
													<span class="text-center">Login with</span>
													<ul class="social-links clearfix">
														<li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
														<li class="twitter"><a target="_blank" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
														<li class="googleplus"><a target="_blank" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
													</ul>
												</form>
											</li>
										</ul>
									</div>
									<div class="btn-group dropdown">
										<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Cart (8)</button>
										<ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
											<li>
												<table class="table table-hover">
													<thead>
														<tr>
															<th class="quantity">QTY</th>
															<th class="product">Product</th>
															<th class="amount">Subtotal</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="quantity">2 x</td>
															<td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
															<td class="amount">$199.00</td>
														</tr>
														<tr>
															<td class="quantity">3 x</td>
															<td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
															<td class="amount">$299.00</td>
														</tr>
														<tr>
															<td class="quantity">3 x</td>
															<td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
															<td class="amount">$1499.00</td>
														</tr>
														<tr>
															<td class="total-quantity" colspan="2">Total 8 Items</td>
															<td class="total-amount">$1997.00</td>
														</tr>
													</tbody>
												</table>
												<div class="panel-body text-right">	
												<a href="shop-cart.html" class="btn btn-group btn-default btn-sm">View Cart</a>
												<a href="shop-checkout.html" class="btn btn-group btn-default btn-sm">Checkout</a>
												</div>
											</li>
										</ul>
									</div>

								</div>
								<!--  header top dropdowns end -->

							</div>
							<!-- header-top-second end -->

						</div>
					</div>
				</div>
			</div>
			<!-- header-top end -->

			<!-- header start classes:
				fixed: fixed navigation mode (sticky menu) e.g. <header class="header fixed clearfix">
				 dark: dark header version e.g. <header class="header dark clearfix">
			================ --> 
			<header class="header fixed clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-3">

							<!-- header-left start -->
							<!-- ================ -->
							<div class="header-left clearfix">

								<!-- logo -->
								<div class="logo">
									<a href="index.html"><img id="logo" src="images/logo_red.png" alt="iDea"></a>
								</div>

								<!-- name-and-slogan -->
								<div class="site-slogan">
									Clean &amp; Powerful Bootstrap Theme
								</div>

							</div>
							<!-- header-left end -->

						</div>
						<div class="col-md-9">

							<!-- header-right start -->
							<!-- ================ -->
							<div class="header-right clearfix">
<?php
                $atom_main_menu = array(
                    'theme_location'  	=> 'atom_menu',
                    'container'			=> 'false',
                   // 'menu_class'    	=> 'atom-nav-menu',
                 //   'fallback_cb'	  	=> 'atom_show_setting_primary_menu'
                );
                wp_nav_menu($atom_main_menu);
				
            ?>
								

							</div>
							<!-- header-right end -->

						</div>
					</div>
				</div>
			</header>
			<!-- header end -->

			<!-- page-intro start-->
			<!-- ================ -->
			<div class="page-intro">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa fa-home pr-10"></i><a href="index.html">Home</a></li>
								<li class="active">Blog</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- page-intro end -->