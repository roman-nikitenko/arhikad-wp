<?php
/**
 * The template for displaying the footer
 *
 * @package banzaifun
 */

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
									'fallback_cb'    => 'arhikad_fallback_menu',
								)
							);
							?>
					</nav>
				</div>
			</div>
			<div class="footer__contacts">
				<span>arhicadnv@ukr.net</span>
				<span>(098) 005 54 04</span>
				<span>Вул Героїв Майдану 15 офіс 58, м.Буча</span>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>