
 <?php 
$loop = new WP_Query( 
	array( 
		'post__not_in' => get_option( 'sticky_posts' ),
		'posts_per_page' => 4,
		'meta_key' => 'menzil_is_featured',
		'meta_value' => 1				
		) );

$m = 0;
?>
		
				
<?php if ($loop->have_posts()) { ?>				
				
	
<!--gallery-->
<div class="gallery">
	<div class="container">
		<div class="gallery-grids">
		<?php while ( $loop->have_posts() ) : $loop->the_post(); $m++; ?>
		<?php if($m%2==1) {?>
			<div class="col-md-8 gallery-grid glry-one">
				<?php if ( has_post_thumbnail() ) { ?>
				

				<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>">
					<img src="<?php post_thumbnail_src(760,488); ?>
					" width="760" height="488" alt="
					<?php the_title(); ?>" class="img-responsive" /></a>

				<?php } else{ ?>
				<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>">
					<img src="<?php bloginfo('template_directory' ); ?>
					/images/default.jpg" width="760" height="488" alt="
					<?php the_title(); ?>" class="img-responsive" /></a>
				<?php } ?>
					<div class="gallery-info">
						<p>
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
							<?php echo getPostViews(get_the_ID()); ?> قېتىم كۆرۈلدى
						</p>
						<a class="shop" href="<?php the_permalink() ?>">سېتىۋېلىش</a>
						<div class="clearfix"></div>
					</div>
				</a>
				<div class="galy-info">
					<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>"><?php the_title('') ?></a>
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
			
			 <?php }else{ ?>
			<div class="col-md-4 gallery-grid glry-two">
				<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
					<img src="<?php post_thumbnail_src(350,419); ?>
					" width="350" height="419" alt="
					<?php the_title(); ?>" class="img-responsive" /></a>

				<?php } else{ ?>
				<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>">
					<img src="<?php bloginfo('template_directory' ); ?>
					/images/default.jpg" width="350" height="419" alt="
					<?php the_title(); ?>" class="img-responsive" /></a>
				<?php } ?>
					<div class="gallery-info galrr-info-two">
						<p>
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
							<?php echo getPostViews(get_the_ID()); ?> قېتىم كۆرۈلدى
						</p>
						<a class="shop" href="<?php the_permalink() ?>">سېتىۋېلىش</a>
						<div class="clearfix"></div>
					</div>
				</a>
				<div class="galy-info">
					<a href="<?php the_permalink('') ?>" title="<?php the_title(); ?><?php setPostViews(get_the_ID()); ?>"><?php the_title('') ?></a>
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
<?php endwhile; ?>
<?php } ?>