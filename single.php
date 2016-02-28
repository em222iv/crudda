<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<?php endif; ?>
	<section >
		<div style="height: 300px;" class="parallax-container">
					<div class="parallax">
						<img src="<?php echo $image[0];?>">
			</div>
		</div>

		<div class="container col s12 m9 l10">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="materialbox" class="scrollspy section">
					<div style="font-family: Quasiparticles;" class="">
							<h2><?php the_title(); ?></h2>
					</div>

						<section>
							<?php the_title(); ?>
							<?php the_content(); ?>
						</section>
				</div>
		<?php endwhile; ?>
	<!-- <?php $prevPost = get_previous_post(true);
		  $prevThumbnail = get_the_post_thumbnail($prevPost->ID, array(150,150) );
		  echo $nextthumbnail; ?><?php previous_post_link( '%link', $prevThumbnail );
		?> -->

	</div>
		<?php else : ?>
		<article>
			<header>
				<h2>Not Found</h2>
			</header>
		</article>
		<?php endif; ?>
	</section>
<?php get_footer(); ?>
