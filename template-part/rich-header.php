<?php
	global $post;
	$pid          = $post->ID;
	$main_title   = get_field( 'title', $pid );
	$main_content = get_field( 'content', $pid );
	$bg_image     = get_field( 'background_image', $pid );

?>
<div
	class="rich-header"
	style="background-image: url(<?php echo esc_url( $bg_image ); ?>);"
>
	<div class="rich-header__container">
		<div class="rich-header__content">
			<h1 class="rich-header__title">
				<?php echo esc_html( $main_title ); ?>
			</h1>
			<p>
				<?php echo esc_html( $main_content ); ?>
			</p>
			</div>
		</div>
	</div>
