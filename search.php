<?php get_header(); ?>
	<section class="body search">
		<?php if (have_posts()) : ?>
			<h1 class="pagetitle">Search Results</h1>
			<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<p> <!-- edit this meta stuff? -->
					<span>Posted on:</span> <?php the_time('F jS, Y'); ?>
					<span>by</span> <?php the_author(); ?> |
					<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
				</p>
			</header>
			<section>
				<?php the_excerpt(); ?>
			</section>
		</article>
		<?php endwhile; ?>
		<!-- <nav class="pagination">
			<ul>
				<li><?php next_posts_link('&laquo; Older Entries') ?></li>
				<li><?php previous_posts_link('Newer Entries &raquo;') ?></li>
			</ul>
		</nav> -->
		<?php else : ?>
		<article>
			<header>
				<h2>Not Found</h2>
			</header>
		</article>
		<?php endif; ?>

	</section>
<?php get_footer(); ?>
