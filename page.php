<?php
/**
 * The main template file
 *
 * @package banzaifun
 */

get_header();
global $post;
$pid             = $post->ID;
$has_rich_header = get_field( 'has_rich_header', $pid );
?>
	<?php if ( $has_rich_header ) : ?>
		<?php get_template_part( 'template-part/rich-header' ); ?>
	<?php endif ?>
	<main class="main-container">
		<article class="post-article">
			<?php if ( ! $has_rich_header ) : ?>
				<?php the_title( '<h1 class="the-title-page">', '</h1>' ); ?>
			<?php endif ?>
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
