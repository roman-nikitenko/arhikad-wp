<?php
/**
 * The template for displaying the footer
 *
 * @package banzaifun
 */

$phone_number    = get_option( 'arhikad_phone_number', '' );
$tel_href_number = preg_replace( '/[\s\-\(\)]/', '', $phone_number );
$address         = get_option( 'arhikad_address', '' );
$email           = get_option( 'arhikad_email', '' );

?>
	<footer id="main-footer" class="footer">
		<div class="main-container footer-container">
			<div class="footer__logo">
				<?php get_template_part( 'template-part/block', 'logo' ); ?>
				<p>Архікад-НВ архітектурні послуги та оформлення документів у Бучі</p>
			</div>
			<div class="footer-content-wrapper">
				<div class="footer-content">
					<nav class="main-navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'footer',
									'menu_id'         => 'footer-menu',
									'menu_class'      => 'footer-menu',
									'container'       => null,
									'container_class' => null,
									'container_id'    => null,
									'fallback_cb'     => 'arhikad_fallback_menu',
								)
							);
							?>
					</nav>
				</div>
			</div>
			<div class="footer__contacts">
				<a href="mailto:<?php echo esc_attr( strtolower( $email ) ); ?>"><?php echo esc_html( $email ); ?></a>
				<a href="tel:<?php echo esc_attr( $tel_href_number ); ?>">
					<?php echo esc_html( $phone_number ); ?>
				</a>
				<a href="https://maps.app.goo.gl/u3heVq8GeEAA8aRX7" target="_blank" rel="noopener noreferrer">
					<?php echo esc_html( $address ); ?>
				</a>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>
