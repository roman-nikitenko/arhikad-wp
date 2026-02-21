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
					<header class="entry-header">
						<h1 class="entry-title ">
							<?php the_title(); ?>
						</h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					<?php
				endwhile;
			endif;
			?>
		</article>
	</main>
<?php
get_footer();