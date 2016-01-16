
<?php get_header(); ?>
<?php include(TEMPLATEPATH . '/slider.php'); ?>
<?php include(TEMPLATEPATH . '/banner.php'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php for ($i=0; $i < 20 ; $i++) { ?>
					
				
			<div class="col-md-3 gallery-grid ">
				<?php if ( has_post_thumbnail() ) { ?>
				

				<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>">
					<img src="<?php post_thumbnail_src(255,269); ?>
					" width="255" height="269" alt="
					<?php the_title(); ?>" class="img-responsive" /></a>

				<?php } else{ ?>
				<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>">
					">
					<img src="<?php bloginfo('template_directory' ); ?>
					/images/default.jpg" width="255" height="269" alt="
					<?php the_title(); ?>" class="img-responsive" /></a>
				<?php } ?>

				<div class="gallery-info">
					<p>
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
						<?php echo getPostViews(get_the_ID()); ?> قېتىم كۆرۈلدى
					</p>
					<a class="shop" href="<?php the_permalink(); ?>">سېتىۋېلىش</a>
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
		<?php } ?>
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