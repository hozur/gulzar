<!DOCTYPE html>
<html>
<head>
<title>
<?php if ( is_home() ) { ?>
<?php bloginfo('name'); ?>|
<?php bloginfo('description'); ?>
<?php } ?>
<?php if ( is_search() ) { ?>
ئىزدەش نەتىجىسى |
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_single() ) { ?>
<?php echo trim(wp_title('',0)); ?>|
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_page() ) { ?>
<?php echo trim(wp_title('',0)); ?>|
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_category() ) { ?>
<?php single_cat_title(); ?>|
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_month() ) { ?>
<?php the_time('F'); ?>|
<?php bloginfo('name'); ?>
<?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?>
<?php  single_tag_title("", true); ?>|
<?php bloginfo('name'); ?>
<?php } ?>
<?php } ?>
</title>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-rtl.min.css" type="text/css" rel="stylesheet" media="all">

<link href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" rel="stylesheet" media="all">

<!-- js -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bootstrap-3.1.1.min.js"></script>
<!-- //js -->	
<!-- cart -->
<script src="<?php bloginfo('template_directory'); ?>/js/simpleCart.min.js"> </script>
<!-- cart -->

<?php if(is_single()) { ?>
<!-- FlexSlider -->
<script defer src="<?php bloginfo('template_directory'); ?>/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/flexslider.css" type="text/css" media="screen" />
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
</script>
<!--//FlexSlider -->
<?php } ?>
<?php wp_head(); ?>
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1 class="navbar-brand"><a  href="<?php bloginfo('url'); ?>"><?php bloginfo('name' ); ?></a></h1>
				</div>
				
				
			
				<!--navbar-header-->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					<?php wp_nav_menu( array('theme_location'=>'h-top-menu','container'=>'','items_wrap'=>'%3$s','fallback_cb'=>'AJI_nav_fallback')); ?>

														
					</ul> 
					<!--/.navbar-collapse-->
				</div>
				<!--//navbar-header-->
			</nav>
			<div class="header-info">
				<div class="header-right search-box">
					<a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>				
					<div class="search">
						<form class="navbar-form">
							<input type="text" class="form-control">
							<button type="submit" class="btn btn-default" aria-label="Left Align">
								ئىزدەش
							</button>
						</form>
					</div>	
				</div>
				<div class="header-right login">
					<a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
					<div id="loginBox">                
						<form id="loginForm">
							<fieldset id="body">
								<fieldset>
									<label for="email">ئېلىخەت ئادرىسى</label>
									<input type="text" name="email" id="email">
								</fieldset>
								<fieldset>
									<label for="password">پارول</label>
									<input type="password" name="password" id="password">
								</fieldset>
								<input type="submit" id="login" value="Sign in">
								<label for="checkbox"><input type="checkbox" id="checkbox"> <i>ئەستە ساقلا</i></label>
							</fieldset>
							<p>تىزىملاتمىغان؟ <a class="sign" href="account.html">كىرىش</a> <span><a href="#">پارولنى ئۇنۇتتىڭىز؟</a></span></p>
						</form>
					</div>
				</div>
				<div class="header-right cart">
					<a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
					<div class="cart-box">
						<h4><a href="checkout.html">
							<span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>) 
						</a></h4>
						<p><a href="javascript:;" class="simpleCart_empty">ھارۋا قۇرۇقداش</a></p>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//header-->