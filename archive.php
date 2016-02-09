<?php get_header(); ?>
	<section class="body archive">
		<div class="container">
			<div class="row">
				<div class="col 9 offset-2">
		<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1>Inlägg i katergorin: &#8216;<?php single_cat_title(); ?>&#8217; </h1>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1>Arkiv för: <?php the_time('F jS, Y'); ?></h1>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>Arkiv för: <?php the_time('F, Y'); ?></h1>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="pagetitle">Arkiv för: <?php the_time('Y'); ?></h1>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="pagetitle">Birgittas Arkiv</h1>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="pagetitle">Blog Arkiv</h1>
			<?php } ?>
			<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
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
