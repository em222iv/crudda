<?php get_header(); ?>
	<section class="body search">
		<?php if (have_posts()) : ?>
		<div class="container">
		  <div class="row">
		    <div class="col 10 offset-2">
						<h1 class="pagetitle">Sökresultat</h1>
			<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="card">
						<?php $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
						<div class="card-header" <?php echo 'style="background-image:url('.$feat_image_url.'); background-size: cover; background-position: center;"'?> >
								<div class="card-header-mask">
										<div class="card-header-date">
												<div class="card-header-date-day"><?php the_time('j'); ?></div>
												<div class="card-header-date-month"><?php the_time('F'); ?></div>
										</div>
										<a class="" href="<?php the_permalink() ?>">
											<div class="card-header-button">
													<div class="card-header-date-day">Läs</div>
											</div>
									</a>
								</div>
						</div>
								<div class="card-body">
										<!-- <a class="" href="<?php the_permalink() ?>"> -->
											<div class="card-body-header">
													<div class="card-body-header-category">
															 <?php $thumb_img = get_post( get_post_thumbnail_id() ) ?>
															 <?php if ( $thumb_img->post_excerpt ) : ?>
																	<div id="image-caption">
																		<?php echo $thumb_img->post_excerpt; ?>
																	</div>
																<?php else : ?>
																		<div id="image-caption">
																			<?php echo "Post Picture" ?>
																		</div>
																	<?php endif ; ?>
													</div>
												<h1><?php the_title(); ?></h1>
												 <div class="card-body-header-sentence">
																	<i class="fa fa-arrow-circle-up"></i>
													</div>
											</div>
												<!-- </a> -->
											<div class="card-body-description">
												<?php echo substr(get_the_excerpt(), 0, 200);?>
											</div>
											<div class="card-body-footer">
													<?php $my_var = get_comments_number( $post_id ); ?>
													<i class="icon icon-comment"></i> <?php echo $my_var ?> comments
													<i style="float:right" > Kategorier: <?php the_category(' ') ?></i>
											</div>
							</div>
				</div>
		</article>
		<?php endwhile; ?>
		<?php else : ?>
		<article>
			<header>
				<h2>Not Found</h2>
			</header>
		</article>
		<?php endif; ?>
		</div>
		</div>
		</div>
	</section>
<?php get_footer(); ?>
