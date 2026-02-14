<?php
	/**
	 * The header for our theme
	 *
	 * @package banzaifun
	 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns#">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
		wp_body_open();
	?>
		<header class="header">
			<div class="main-header">
				<?php get_template_part( 'template-part/block', 'logo' ); ?>
				<div class="navigation">
					<nav class="main-navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'menu_id'         => 'main-menu',
									'menu_class'      => 'primary-menu',
									'container'       => null,
									'container_class' => null,
									'container_id'    => null,
									'fallback_cb'    => 'arhikad_fallback_menu',
								)
							);
							?>
					</nav>
				</div>
				<div class="contacts">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/viber.svg' ); ?>" alt="viber">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/telegram.svg' ); ?>" alt="telegram">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/whatsapp.svg' ); ?>" alt="whatsapp">
					<a href="tel:+1234567890">(098) 005 54 04</a>
				</div>
			</div>
		</header>