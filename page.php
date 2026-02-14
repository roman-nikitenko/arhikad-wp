<?php
/**
 * The main template file
 *
 * @package banzaifun
 */

get_header();
?>
	<?php get_template_part( 'template-part/rich-header' ); ?>
	<main class="main-container">
		<article class="post-article">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
						<?php the_content(); ?>
					<?php
				endwhile;
			endif;
			?>
		</article>
	</main>
<?php
get_footer();