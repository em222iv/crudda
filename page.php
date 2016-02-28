<?php
/*
Template Name: Crudda
*/
?>

<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<?php endif; ?>

</div><!-- end #category-name -->
<section class="body page">
<div class="content">
      <div id="large-header" style="background-image: url('<?php echo $image[0]; ?>')" class="large-header">
          <canvas id="demo-canvas"></canvas>
          <h1 class="main-title"><?php echo get_the_title(); ?></span></h1>
      </div>
</div>
<div id="main-container" class="container">
  <div class="row">
    <div class="col l9">
        <h3>Senaste inläggen</h3>
          <div class="divider"></div>
          <div class="wrapper">
        <?php query_posts(array('post_type' => 'post')); ?>
        <?php while ( have_posts() ) : the_post(); ?>
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
                                          <?php echo "</br>" ?>
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
                              <i class="icon icon-comment"></i> <?php echo $my_var ?> comments |
                              <i style="float:right" > Kategorier: <?php the_category(' ') ?></i>
                          </div>
                  </div>
            </div>
        <?php endwhile; ?><!--  End the Loop -->
          </div>
        <div class="divider"></div>
    </div>
    <div class="col l3">
        <div id="aside">
            <h3>Arkiv</h3>
              <div class="divider"></div>
            <?php get_sidebar(); ?>
        </div>
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
