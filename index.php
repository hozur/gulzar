
<?php get_header(); ?>
<?php include(TEMPLATEPATH . '/slider.php'); ?>
<!--gallery-->
<div class="gallery">
	<div class="container">
		<div class="gallery-grids">
			<div class="col-md-8 gallery-grid glry-one">
				<a href="products.html">
					<img src="<?php bloginfo('template_directory'); ?>
					/images/g1.jpg" class="img-responsive" alt=""/>
					<div class="gallery-info">
						<p>
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
							view
						</p>
						<a class="shop" href="single.html">SHOP NOW</a>
						<div class="clearfix"></div>
					</div>
				</a>
				<div class="galy-info">
					<p>Lorem Ipsum is simply</p>
					<div class="galry">
						<div class="prices">
							<h5 class="item_price">$95.00</h5>
						</div>
						<div class="rating">
							<span>☆</span>
							<span>☆</span>
							<span>☆</span>
							<span>☆</span>
							<span>☆</span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4 gallery-grid glry-two">
				<a href="products.html">
					<img src="<?php bloginfo('template_directory'); ?>
					/images/g2.jpg" class="img-responsive" alt=""/>
					<div class="gallery-info galrr-info-two">
						<p>
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
							<?php echo getPostViews(get_the_ID()); ?> view
						</p>
						<a class="shop" href="single.html">SHOP NOW</a>
						<div class="clearfix"></div>
					</div>
				</a>
				<div class="galy-info">
					<p>Lorem Ipsum is simply</p>
					<div class="galry">
						<div class="prices">
							<h5 class="item_price">$95.00</h5>
						</div>
						<div class="rating">
							<span>☆</span>
							<span>☆</span>
							<span>☆</span>
							<span>☆</span>
							<span>☆</span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-md-3 gallery-grid ">
				<?php if ( has_post_thumbnail() ) { ?>
				

				<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>"><?php the_title('') ?></a>
					<img src="<?php post_thumbnail_src(635,278); ?>
					" width="635" height="278" alt="
					<?php the_title(); ?>" class="img-responsive" /></a>

				<?php } else{ ?>
				<a href="<?php the_permalink() ?>
					">
					<img src="<?php bloginfo('template_directory' ); ?>
					/images/default.jpg" width="635" height="278" alt="
					<?php the_title(); ?>" class="img-responsive" /></a>
				<?php } ?>

				<div class="gallery-info">
					<p>
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
						<?php echo getPostViews(get_the_ID()); ?> view
					</p>
					<a class="shop" href="<?php the_permalink(); ?>">SHOP NOW</a>
					<div class="clearfix"></div>
				</div>
			</a>
			<div class="galy-info">
				<p>
					<?php the_title(); ?></p>
				<div class="galry">
					<div class="prices">
						<h5 class="item_price">$95.00</h5>
					</div>
					<div class="rating">
						<span>☆</span>
						<span>☆</span>
						<span>☆</span>
						<span>☆</span>
						<span>☆</span>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<?php endwhile;endif; ?></div>
</div>
</div>
<!--//gallery-->
<!--subscribe-->
<div class="subscribe">
<div class="container">
	<h3>Newsletter</h3>
	<form>
		<input type="text" class="text" value="Email" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Email';}">
		<input type="submit" value="Subscribe"></form>
</div>
</div>
<!--//subscribe-->
<?php get_footer(); ?>