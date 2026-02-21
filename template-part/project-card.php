<?php
	$project_id         = isset( $args ) && ! is_null( $args ) ? $args : null;
	$project_name       = get_the_title( $project_id );
	$featured_image_id  = get_post_thumbnail_id( $project_id );
	$featured_image_url = $featured_image_id ? wp_get_attachment_image_url( $featured_image_id, 'full' ) : '';
	$project_permalink  = get_permalink( $project_id );
?>
<?php if ( ! empty( $project_id ) ) : ?>
	<div class="project-card">
		<img
			src="<?php echo esc_url( $featured_image_url ); ?>"
			alt="<?php echo esc_attr( $project_name ); ?>"
			class="project-card__image"
		>
		<div class="project-card__content">
			<a class="stretched-link" href="<?php echo esc_url( $project_permalink ); ?>">
				<?php echo esc_html( $project_name ); ?>
			</a>

		</div>
	</div>
<?php endif ?>