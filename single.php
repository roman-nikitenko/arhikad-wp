<?php
/**
 * The main template file
 *
 * @package banzaifun
 */

get_header();
?>
	<main class="main-container">
		<article class="post-article">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
						<h1 class="post-title"><?php the_title(); ?></h1>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-featured-image">
								<?php the_post_thumbnail( 'large' ); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
					<?php
				endwhile;
			endif;
			?>
		</article>
	</main>
<?php
get_footer();