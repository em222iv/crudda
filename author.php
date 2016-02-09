<?php
/*
Template Name: author
*/
?>

<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<?php endif; ?>

	<section class="body page">
		<div class="container">
				<div class="col 10 offset-2 center-align">
						<img class="circle" style="margin-top:20px" src="<?php echo $image[0]; ?>" alt="" />
					</div>
		</div>
	</section>
<?php get_footer(); ?>
