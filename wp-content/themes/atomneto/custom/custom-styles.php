<?php
/**
 * Custom Layout,Font,Css
 *
 * @since ATOM 1.0
 */
 
 global $atom_options, $google_custom_fonts, $options_custom_color;

 if($google_custom_fonts == null){
	 atom_get_custom_font();
 }


header("Content-type: text/css; charset: UTF-8");
?>

::-moz-selection { background:<?php echo atom_get_options_key('theme-color'); ?>; color: #ffffff; text-shadow: none; }
::selection { background:<?php echo atom_get_options_key('theme-color'); ?>; color: #ffffff; text-shadow: none; }

/* 	----------------------------------------------------------------------------------------------	
										CUSTOM GENERAL STYLE																												
	----------------------------------------------------------------------------------------------	*/
<?php
//boxed padding
if(intval(atom_get_options_key('global-layout')) == 0) {
	echo '.wrapper {margin: '.atom_get_options_key('global-layout-boxed-padding').'px auto;}';
} 
?>
/* header logo */
.atom-header-logo .logo {margin-top: <?php echo atom_get_options_key('logo-image-padding-top'); ?>px;}
/* social */
.atom-header-right .atom-social {margin-top: <?php echo atom_get_options_key('header-social-padding-top'); ?>px;}
.site-header-style-3 .atom-social {margin-top: <?php echo atom_get_options_key('header-social-padding-top'); ?>px;}

/* header custom content */
.atom-header-right-custom {margin-top: <?php echo atom_get_options_key('header-custom-content-padding-top'); ?>px;}


.site-header-style-3 .atom-header-right > ul {margin-top: <?php echo atom_get_options_key('header-custom-cart-padding-top'); ?>px;}
<?php
if(atom_get_options_key('global-title-align') != ""){
	switch( intval(atom_get_options_key('global-title-align')) ){
		case 0: echo '#site-content-header {text-align:left;}';break;
		case 1: echo '#site-content-header {text-align:center;}';break;
		case 2: echo '#site-content-header {text-align:right;}';break;
	}
}
?>

<?php if(atom_get_options_key('custom-background-enable') == "on"){ ?>
/* 	----------------------------------------------------------------------------------------------	
										CUSTOM BACKGROUND																												
	----------------------------------------------------------------------------------------------	*/
<?php 
/* body */
if(intval(atom_get_options_key('global-layout')) != 1) {atom_add_background_style('global','body.boxed-layout, body.fixed-layout');} 
/* header */
atom_add_background_style('global-header','#atom-header');
/* title */
atom_add_background_style('global-title','#site-content-header');
/* content */
atom_add_background_style('global-content','#page-content-wrap');
/* footer */
atom_add_background_style('global-footer','#site-footer-widget');
}
?>

<?php  if(atom_get_options_key('custom-enable-font') == "on"){ ?>  
/* 	----------------------------------------------------------------------------------------------	
										CUSTOM FONT																												
	----------------------------------------------------------------------------------------------	*/
body {font-family:<?php echo atom_get_current_font_name(atom_get_options_key('custom-general-font'));?>,"Helvetica Neue", Helvetica, Arial, sans-serif;font-size:<?php echo atom_get_options_key('custom-general-font-size'); ?>px;}
h1,h2,h3,h4,h5,h6 {font-family:<?php echo atom_get_options_key('title_font'); ?>,Arial,Helvetica,sans-serif;}
.atom-nav-menu li.menu-item > a {font-size:<?php echo atom_get_options_key('custom-menu-font-size'); ?>px;font-family: <?php echo atom_get_options_key('menu_font'); ?>,Helvetica,Arial,sans-serif;}
.atom-nav-menu li li.menu-item > a {font-size:<?php echo atom_get_options_key('custom-menu-sub-font-size'); ?>px;}
.atom-nav-menu .mega-menu.mega-horizontal .mega-menu-item-stitle, .atom-nav-menu .mega-menu.mega-vertical .mega-menu-item-stitle {font-size:<?php echo atom_get_options_key('custom-menu-sub-title-font-size'); ?>px;}
<?php } ?>
<?php  if(atom_get_options_key('custom-enable-color') == "on"){ ?>  
/* 	----------------------------------------------------------------------------------------------	
										CUSTOM COLOR																												
	----------------------------------------------------------------------------------------------	*/

body {color:<?php echo atom_get_options_key('custom-general-color'); ?>;}
h1,h2,h3,h4,h5,h6 {color:<?php echo atom_get_options_key('custom-h-color'); ?>;}

textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus {
  	border: 1px solid <?php echo atom_get_options_key('theme-color'); ?> !important;
}

a {color: <?php echo atom_get_options_key('custom-a-color'); ?>;}
a:hover {color: <?php echo atom_get_options_key('custom-a-hover-color'); ?>;}

/* header topbar */
#header-banner {background: <?php echo atom_get_options_key('custom-topbanner-bg-color'); ?>;}
#header-topbar {background:<?php echo atom_get_options_key('custom-topbar-bg-color'); ?>;color:<?php echo atom_get_options_key('custom-topbar-font-color'); ?>;}
#header-topbar ul li:hover{background:<?php echo atom_get_options_key('custom-topbar-bg-hover-color'); ?>;}
#header-topbar ul li ul {background:<?php echo atom_get_options_key('custom-topbar-bg-hover-color'); ?>;}
#header-topbar span, #header-topbar a {color:<?php echo atom_get_options_key('custom-topbar-font-color'); ?>;}
#header-topbar a:hover, 
#header-topbar a:hover .amount {color:<?php echo atom_get_options_key('custom-topbar-hover-font-color'); ?>;}
#header-topbar li ul li:hover {background:<?php echo atom_get_options_key('custom-topbar-sub-bg-hover-color'); ?>;}

<?php
if(atom_get_options_key('custom-menu-color-enable') == "on"){
?>
#atom-nav {border-top: 1px <?php echo atom_get_options_key('custom-menu-border-top-color'); ?> solid;border-bottom: 4px <?php echo atom_get_options_key('custom-menu-border-bottom-color'); ?> solid;background: <?php echo atom_get_options_key('custom-menu-bg-color'); ?>;}
.atom-nav-menu > li.current-menu-item > a, .atom-nav-menu > li.current-menu-ancestor > a {border-top: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?> 2px solid;}
.atom-nav-menu > li > a {color: <?php echo atom_get_options_key('custom-menu-item-font-color'); ?>;}
.atom-nav-menu > li:hover > a {color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;border-top: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?> 2px solid;background: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?>;}
.atom-nav-menu > li > ul li.menu-item {background: <?php echo atom_get_options_key('custom-submenu-item-bg-color'); ?>;border: 1px solid <?php echo atom_get_options_key('custom-submenu-item-border-color'); ?>;}
.atom-nav-menu > li > ul li.menu-item > a {color: <?php echo atom_get_options_key('custom-submenu-item-font-color'); ?>;}
.atom-nav-menu > li > ul li.menu-item > a:hover {color: <?php echo atom_get_options_key('custom-submenu-item-hover-font-color'); ?>; background: <?php echo atom_get_options_key('custom-submenu-item-bg-hover-color'); ?>;}

.atom-nav-menu .mega-menu.mega-horizontal li.menu-item > a {color: <?php echo atom_get_options_key('custom-mega-menu-item-font-color'); ?>;}
.atom-nav-menu .mega-menu.mega-horizontal li li.menu-item > a {color: <?php echo atom_get_options_key('custom-mega-submenu-item-font-color'); ?>;}
.atom-nav-menu .mega-menu.mega-horizontal li.menu-item > a:hover {color: <?php echo atom_get_options_key('custom-mega-menu-item-hover-font-color'); ?>;}
.atom-nav-menu .mega-menu.mega-horizontal li li.menu-item > a:hover {color: <?php echo atom_get_options_key('custom-mega-submenu-item-hover-font-color'); ?>;}

.atom-nav-menu .mega-menu.mega-horizontal > ul {background: <?php echo atom_get_options_key('custom-mega-menu-background-color'); ?>;border: 1px solid <?php echo atom_get_options_key('custom-mega-menu-border-color'); ?>;}
.atom-nav-menu .mega-menu.mega-horizontal > ul > li > a {border-bottom: <?php echo atom_get_options_key('custom-mega-menu-item-border-bottom-color'); ?> solid 1px;}

.atom-nav-menu .mega-menu.mega-vertical > ul {border: 1px solid <?php echo atom_get_options_key('custom-mega-menu-ver-border-color'); ?>;}

.atom-nav-right-container > ul > li:hover > a {background:<?php echo atom_get_options_key('custom-menu-item-hover-color'); ?>;}

.site-header-style-2 .atom-nav-menu > li > ul, .site-header-style-2 .atom-nav-menu > li > ul ul.sub-menu {border: 1px solid <?php echo atom_get_options_key('custom-submenu-item-border-color'); ?>;}
.site-header-style-2 .atom-nav-menu > li > ul li.menu-item {border-bottom: 1px solid <?php echo atom_get_options_key('custom-submenu-item-border-color'); ?>;}

.site-header-style-2 .atom-nav-menu > li.current-menu-item > a, .site-header-style-2 .atom-nav-menu > li.current-menu-ancestor > a {
color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;
}
.site-header-style-2 .atom-nav-menu > li:hover > a {background: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?>;color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;}

.site-header-style-2 .atom-nav-menu > li > ul li.menu-item > a:hover {color: <?php echo atom_get_options_key('custom-submenu-item-hover-font-color'); ?>; background: <?php echo atom_get_options_key('custom-submenu-item-bg-hover-color'); ?>;}

.site-header-style-3 #atom-nav {border-top: 1px <?php echo atom_get_options_key('custom-menu-border-top-color'); ?> solid;border-bottom: 1px <?php echo atom_get_options_key('custom-menu-border-bottom-color'); ?> solid;}

.site-header-style-3 .atom-nav-menu > li.current-menu-item > a, .site-header-style-3 .atom-nav-menu > li.current-menu-ancestor > a {
border-bottom: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?> 2px solid;color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;}

.site-header-style-3 .atom-nav-menu > li:hover > a {border-bottom: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?> 2px solid;color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;}
.site-header-style-3 .atom-nav-menu > li > ul li.menu-item:first-child {border-top: 2px solid <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?>;}
.site-header-style-3 .atom-nav-menu .mega-menu.mega-horizontal > ul {border-top: 2px solid <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?>;}
.site-header-style-4 .atom-nav-menu > li.current-menu-item > a,
.site-header-style-4 .atom-nav-menu > li.current-menu-ancestor > a {background: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?>;color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;}

.site-header-style-4 .atom-nav-menu > li:hover > a {background: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?>;color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;}
.site-header-style-4 .atom-nav-menu ul.sub-menu {border-top: 2px solid <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?>;}
.site-header-style-4 .atom-header-right-list > li:hover > a {background: <?php echo atom_get_options_key('theme-color'); ?>;border: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-5 #atom-nav {border-top: 1px <?php echo atom_get_options_key('custom-menu-border-top-color'); ?> solid;border-bottom: 2px <?php echo atom_get_options_key('custom-menu-border-bottom-color'); ?> solid;background: <?php echo atom_get_options_key('custom-menu-bg-color'); ?>;}
.site-header-style-5 .atom-nav-menu > li.current-menu-item > a, 
.site-header-style-5 .atom-nav-menu > li.current-menu-ancestor > a {
	color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;border-bottom: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?> 2px solid;}
.site-header-style-5 .atom-nav-menu > li:hover > a {color: <?php echo atom_get_options_key('custom-menu-item-hover-font-color'); ?>;border-bottom: <?php echo atom_get_options_key('custom-menu-item-hover-color'); ?> 2px solid;}

<?php
}else{
?>
/* header menu area */
#atom-nav {border-bottom: 4px <?php echo atom_get_options_key('theme-color'); ?> solid;}

/* Nav Menu */
.atom-nav-menu > li.current-menu-item > a, .atom-nav-menu > li.current-menu-ancestor > a {border-top: <?php echo atom_get_options_key('theme-color'); ?> 2px solid;}
.atom-nav-menu > li:hover > a {border-top: <?php echo atom_get_options_key('theme-color'); ?> 2px solid;background: <?php echo atom_get_options_key('theme-color'); ?>;}

/*.mega vertical*/
.atom-nav-menu .mega-menu.mega-vertical > ul{border: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.atom-nav-menu .mega-menu.mega-vertical > ul > li > a:after {border-left: 2px solid <?php echo atom_get_options_key('theme-color'); ?>;
	border-right: 2px solid <?php echo atom_get_options_key('theme-color'); ?>;
	border-bottom: 2px solid <?php echo atom_get_options_key('theme-color'); ?>;
	border-top: 2px solid <?php echo atom_get_options_key('theme-color'); ?>;
}
.atom-nav-right-container > ul > li:hover > a {background:<?php echo atom_get_options_key('theme-color'); ?>;}

/* = Site Header Style 2
-------------------------------------------------------------- */
.site-header-style-2 .atom-nav-menu > li:hover > a {color: <?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-2 .atom-nav-menu > li.current-menu-item > a, 
.site-header-style-2 .atom-nav-menu > li.current-menu-ancestor > a {color: <?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-2 .atom-search-container > ul > li.atom-cart-list > a {background:<?php echo atom_get_options_key('theme-color'); ?>;}

/* = Site Header Style 3
-------------------------------------------------------------- */

.site-header-style-3 .atom-nav-menu > li.current-menu-item > a, .site-header-style-3 .atom-nav-menu > li.current-menu-ancestor > a {
	border-bottom: <?php echo atom_get_options_key('theme-color'); ?> 2px solid;}
.site-header-style-3 .atom-nav-menu > li:hover > a {border-bottom: <?php echo atom_get_options_key('theme-color'); ?> 2px solid;color:<?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-3 .atom-header-right > ul > li.atom-cart-list > a {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-3 .atom-nav-menu > li > ul li.menu-item:first-child {border-top:2px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-3 .atom-nav-menu .mega-menu.mega-horizontal > ul {border-top: 2px solid <?php echo atom_get_options_key('theme-color'); ?>;}

/* = Site Header Style 4
-------------------------------------------------------------- */
.site-header-style-4 .atom-nav-menu > li.current-menu-item > a,
.site-header-style-4 .atom-nav-menu > li.current-menu-ancestor > a {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-4 .atom-nav-menu > li:hover > a {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-4 .atom-nav-menu ul.sub-menu {border-top: 2px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.site-header-style-4 .atom-header-right-list > li:hover > a {background: <?php echo atom_get_options_key('theme-color'); ?>;border: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;}

/* = Site Header Style 5
-------------------------------------------------------------- */
.site-header-style-5 .atom-nav-menu > li.current-menu-item > a, 
.site-header-style-5 .atom-nav-menu > li.current-menu-ancestor > a {
	color: <?php echo atom_get_options_key('theme-color'); ?>;border-bottom: <?php echo atom_get_options_key('theme-color'); ?> 2px solid;}
.site-header-style-5 .atom-nav-menu > li:hover > a {color: <?php echo atom_get_options_key('theme-color'); ?>;border-bottom: <?php echo atom_get_options_key('theme-color'); ?> 2px solid;}

<?php } ?>
#site-content-header .title {color: <?php echo atom_get_options_key('custom-page-title-color'); ?>;}

#site-footer-bottom a {color:<?php echo atom_get_options_key('custom-footer-a-color'); ?>;}
#site-footer-bottom a:hover {color:<?php echo atom_get_options_key('custom-footer-a-hover-color'); ?>;}

#back-top:hover {background:<?php echo atom_get_options_key('theme-color'); ?>;}
.post-entry .post-date-type .post-type {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.post-tip .bg {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.post-quote {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.single-post-date-type .post-type {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.comment-list .comment-item .comment-content a {color:<?php echo atom_get_options_key('theme-color'); ?>;}
.comment-list .comment-item .comment-content a:hover {color:<?php echo atom_get_options_key('custom-theme-btn-hover-color'); ?>;}
.post-ajax-element.blog-timeline-style-1 .post-timeline-element-container .post-type {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.post-ajax-element.blog-timeline-style-2 .post-timeline-element-container .post-type {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.shortcode-post-entry.blog-shortcode-style-3 .entry-date {background: <?php echo atom_get_options_key('theme-color'); ?>;}

/* portfolio */
.portfolio-filters-cats li a.active {background:<?php echo atom_get_options_key('theme-color'); ?>;}
.portfolio-element.portfolio-style-2:hover .portfolio-element-container {border-bottom: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.single-portfolio-metas {border-top: 2px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.single-portfolio-metas li a {color:<?php echo atom_get_options_key('theme-color'); ?>;}
.single-portfolio-metas li a:hover {color:<?php echo atom_get_options_key('custom-theme-btn-hover-color'); ?>;}

/* footer */
.site-footer-widget a {color: <?php echo atom_get_options_key('custom-footer-widget-a-color'); ?>;}
.site-footer-widget a:hover {color:<?php echo atom_get_options_key('custom-footer-widget-a-hover-color'); ?>;}

/* sidebar */
.widget_product_search #searchform #searchsubmit {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.sidebar-portfolio-recent.icon-style .post-type {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.sidebar-blog-recent.icon-style .post-type {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.sidebar-blog-recent .entry-meta a {color:#888;}
.sidebar-blog-recent .entry-meta a:hover {color:<?php echo atom_get_options_key('theme-color'); ?>;}

/* shortcode */
.atom-content .title span {color:<?php echo atom_get_options_key('theme-color'); ?>;}
.btn:hover, .btn:focus {color: <?php echo atom_get_options_key('theme-color'); ?>;}
.btn.btn-theme {background:<?php echo atom_get_options_key('theme-color'); ?>;}
.btn.btn-theme:hover {background:<?php echo atom_get_options_key('custom-theme-btn-hover-color'); ?>;}

.map-info-window.black a {color:#fff;}
.map-info-window.black a:hover {color:<?php echo atom_get_options_key('theme-color'); ?>;}

.skills .skill-cover {background: <?php echo atom_get_options_key('theme-color'); ?>;}

.bullets.theme li > span {background: <?php echo atom_get_options_key('theme-color'); ?>;}

.atom-accordion .accordion-icon {background: <?php echo atom_get_options_key('theme-color'); ?>;}

.flexslider.atom-fl .flex-direction-nav a:hover {background-color: <?php echo atom_get_options_key('theme-color'); ?>;}
.flexslider.atom-fl.atom-fl-clean .flex-control-nav li .flex-active {background: <?php echo atom_get_options_key('theme-color'); ?>;}

.tabs .tabs-nav li.current {border-top:1px <?php echo atom_get_options_key('theme-color'); ?> solid;}
.sidetabs.left .sidetabs-nav li.current {border-right: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.sidetabs.right .sidetabs-nav li.current {border-left: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;}

.timeline.timeline-style-1 .timeline-date span {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.timeline.timeline-style-1 .timeline-date span:after {border-left: 7px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.timeline .features .timeline-c-line {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.timeline .start .timeline-c-line {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.timeline .end .timeline-c-line {border: 5px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.timeline.timeline-style-3 .timeline-icon span {background: <?php echo atom_get_options_key('theme-color'); ?>;}

.features.bg:hover {background:<?php echo atom_get_options_key('theme-color'); ?>;}
.features .feature-icon {color: <?php echo atom_get_options_key('theme-color'); ?>;}
.features.circle .feature-icon,.features.rect .feature-icon {border: 2px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.features.circle:hover .feature-icon,.features.rect:hover .feature-icon {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.features.center.cover:hover {border: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;}

.totalcount.totalcount-style-2 .totalcount-number {border: 4px solid <?php echo atom_get_options_key('theme-color'); ?>;}
.totalcount.totalcount-style-2 .totalnumber {color: <?php echo atom_get_options_key('theme-color'); ?>;}

.atom-pagenav li a.current,
.atom-pagenav li a:hover {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.atom-pagenav.black li a.current, .atom-pagenav.black li a:hover {background: <?php echo atom_get_options_key('theme-color'); ?>;}

.wpcf7 .wpcf7-submit {background: <?php echo atom_get_options_key('theme-color'); ?>;}
.wpcf7 .wpcf7-submit:hover {background:<?php echo atom_get_options_key('custom-theme-btn-hover-color'); ?>;}

.woocommerce div.product span.price,.woocommerce-page div.product span.price,.woocommerce #content div.product span.price,.woocommerce-page #content div.product span.price,.woocommerce div.product p.price,.woocommerce-page div.product p.price,.woocommerce #content div.product p.price,.woocommerce-page #content div.product p.price {
	color: <?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active {
	border-top-color: <?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce ul.products li.product .price,.woocommerce-page ul.products li.product .price {
	color: <?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce a.button.added:before,.woocommerce-page a.button.added:before,.woocommerce button.button.added:before,.woocommerce-page button.button.added:before,.woocommerce input.button.added:before,.woocommerce-page input.button.added:before,.woocommerce #respond input#submit.added:before,.woocommerce-page #respond input#submit.added:before,.woocommerce #content input.button.added:before,.woocommerce-page #content input.button.added:before {
	color: <?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce a.button:hover,.woocommerce-page a.button:hover,.woocommerce button.button:hover,.woocommerce-page button.button:hover,.woocommerce input.button:hover,.woocommerce-page input.button:hover,.woocommerce #respond input#submit:hover,.woocommerce-page #respond input#submit:hover,.woocommerce #content input.button:hover,.woocommerce-page #content input.button:hover {
	background:<?php echo atom_get_options_key('theme-color'); ?>;
	border:1px solid <?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce a.button.alt,.woocommerce-page a.button.alt,.woocommerce button.button.alt,.woocommerce-page button.button.alt,.woocommerce input.button.alt,.woocommerce-page input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce-page #respond input#submit.alt,.woocommerce #content input.button.alt,.woocommerce-page #content input.button.alt {
	background:<?php echo atom_get_options_key('theme-color'); ?>;
	border:1px solid <?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce .star-rating span,.woocommerce-page .star-rating span {
	color: <?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce ul.cart_list li ins,.woocommerce-page ul.cart_list li ins ,.woocommerce ul.product_list_widget li ins ,.woocommerce-page ul.product_list_widget li ins{
	color:<?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {
	border:1px solid <?php echo atom_get_options_key('theme-color'); ?>;
	background:<?php echo atom_get_options_key('theme-color'); ?>;
}
.woocommerce .thumbnails-ul li a.current, .woocommerce-page .thumbnails-ul li a.current {border: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;}

.woocommerce .thumbnails-ul li a.current:before, .woocommerce-page .thumbnails-ul li a.current:before {border-bottom: 6px solid <?php echo atom_get_options_key('theme-color'); ?>;}

.cart-list_product-quantity .amount {color:<?php echo atom_get_options_key('theme-color'); ?>;}
.cart-list_total .total .amount {color: <?php echo atom_get_options_key('theme-color'); ?>;}

.woocommerce-ordering .orderby-list li.select .fa-check{display:inline-block;color: <?php echo atom_get_options_key('theme-color'); ?>;}
.woocommerce-ordering-listorder a.select {background: <?php echo atom_get_options_key('theme-color'); ?>;border: 1px solid <?php echo atom_get_options_key('theme-color'); ?>;color: #fff;}

<?php } ?>
/* 	----------------------------------------------------------------------------------------------	
										RETINA																												
	----------------------------------------------------------------------------------------------	*/
@media only screen and (-Webkit-min-device-pixel-ratio: 1.5),
only screen and (-moz-min-device-pixel-ratio: 1.5),
only screen and (-o-min-device-pixel-ratio: 3/2),
only screen and (min-device-pixel-ratio: 1.5) {
<?php if(atom_get_options_key('custom-background-enable') == "on"){ 
/* body */
if(intval(atom_get_options_key('global-layout')) != 1) {atom_add_background_style('global','body.boxed-layout, body.fixed-layout', 0, true);}
/* header */
atom_add_background_style('global-header','#atom-header', 0, true);
/* title */
atom_add_background_style('global-title','#site-content-header', 0, true);
/* content */
atom_add_background_style('global-content','#page-content-wrap', 0, true);
/* footer */
atom_add_background_style('global-footer','#site-footer-widget', 0, true);
}?>
}