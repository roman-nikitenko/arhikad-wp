<?php
/**
 * Template part for the Latest Projects block.
 *
 * @package banzai
 */

$args = array(
	'post_type'      => 'projects',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'fields'         => 'ids',
);

$latest_projects_query = new WP_Query( $args );
$latest_projects_ids   = $latest_projects_query->posts;
?>
<?php if ( ! empty( $latest_projects_ids ) ) : ?>
	<div class="projects-list">
		<?php foreach ( $latest_projects_ids as $project_id ) : ?>
			<?php get_template_part( 'template-part/project-card', null, $project_id ); ?>
		<?php endforeach ?>	
	</div>
<?php endif ?>