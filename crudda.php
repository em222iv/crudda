<?php
/*
Template Name: crudda
*/
?>

<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<?php endif; ?>

</div><!-- end #category-name -->

<div class="content">
      <div id="large-header" style="background-image: url('<?php echo $image[0]; ?>')" class="large-header">
          <canvas id="demo-canvas"></canvas>
          <h1 class="main-title"><?php echo get_the_title(); ?></span></h1>
      </div>
</div>
<div class="container">
  <div class="row">
    <div class="col l9">
        <h3>Senaste inläggen</h3>
          <div class="divider"></div>
        <?php query_posts(array('post_type' => 'post')); ?>
        <?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
          <div class="card">
                <div class="card-header">
                    <div class="card-header-mask">
                        <div class="card-header-date">
                            <div class="card-header-date-day">12</div>
                            <div class="card-header-date-month">May</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body-header">
                        <div class="card-body-header-category">Photos</div>
                        <h1>True Paradise on Earth: Unknown Place</h1>
                        <p class="card-body-header-sentence">
                            They call it <span>"</span>God's Own Country.<span>"</span>
                        </p>
                    </div>
                    <p class="card-body-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Molestias autem aliquid, recusandae maiores iste fuga,
                        explicabo dolor vitae magnam!
                    </p>
                    <div class="card-body-footer">
                        <i class="icon icon-time"></i> 6min. read
                        <i class="icon icon-comment"></i> 39 comments
                    </div>
                </div>
            </div>
              <!-- <div style="height: 200px;" class="parallax-container">
                 <div class="parallax">
                   <img src="<?php the_post_thumbnail() ?>">
                 </div>
               </div>
              <h1 class="header center teal-text text-lighten-2"><?php the_title() ?></h1>
              <?php echo substr(the_excerpt(), 0, 20);?>
              <a class="btn waves-effect orange " href="<?php the_permalink() ?>">Läs mer</a> -->
        <?php endwhile; ?><!--  End the Loop -->
        <div class="divider"></div>
    </div>
    <div class="col l3">
        <div id="aside">
            <h3>Aside</h3>
              <div class="divider"></div>
            <?php get_sidebar(); ?>
        </div>
    </div>
  </div>
</div>
	<!-- <section class="body page">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1><?php the_title(); ?></h1>
				<p> <!-- edit this meta stuff?
					<span>Posted on:</span> <?php the_time('F jS, Y'); ?>
					<span>by</span> <?php the_author(); ?> |
					<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
				</p>
			</header>
			<section>
				<?php the_content(); ?>
			</section>
			<footer> <!-- post metadata
				<p><?php the_tags('<span>Tags:</span> ', ', ', ''); ?></p>
				<p><span>Posted in</span> <?php the_category(', ') ?> |
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				<?php comments_template(); ?>
			</footer>
		</article>
		<?php endwhile; ?>
		<?php else : ?>
		<article>
			<header>
				<h2>Not Found</h2>
			</header>
		</article>
		<?php endif; ?>
	<?php get_sidebar(); ?>
	</section> -->
<?php get_footer(); ?>
