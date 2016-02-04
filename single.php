<?php get_header(); ?>


	<section >
		<div class="row">
				<div class="col s8 offset-s2">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<header>
				<div style="font-family: Quasiparticles;" class="">
						<h1><?php the_title(); ?></h1>
				</div>

				<p>
					<span>Posted on:</span> <?php the_time('F jS, Y'); ?>
					<span>by</span> <?php the_author(); ?> |
					<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
				</p>
			</header>
			<section>
				<?php the_title(); ?>
				<?php the_content(); ?>
			</section>
			<footer>
				<p><?php the_tags('<span>Tags:</span> ', ', ', ''); ?></p>
				<p><span>Posted in</span> <?php the_category('<div class="dfs">',',','</div>') ?> |
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				<?php comments_template(); ?>
			</footer>
		</div>
	</div>

		<?php endwhile; ?>

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

<!-- <header>
	<h1><?php the_title(); ?></h1>
	<p>
		<span>Posted on:</span> <?php the_time('F jS, Y'); ?>
		<span>by</span> <?php the_author(); ?> |
		<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
	</p>
</header>
<section>
	<?php the_content(); ?>
</section>
<footer>
	<p><?php the_tags('<span>Tags:</span> ', ', ', ''); ?></p>
	<p><span>Posted in</span> <?php the_category(', ') ?> |
	<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
	<?php comments_template(); ?>
</footer>
</article> -->
