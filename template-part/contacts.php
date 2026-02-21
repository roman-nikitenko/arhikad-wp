<?php
	$phone_number    = get_option( 'arhikad_phone_number', '' );
	$tel_href_number = preg_replace( '/[\s\-\(\)]/', '', $phone_number );
?>
<div class="contacts">
	<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/viber.svg' ); ?>" alt="viber">
	<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/telegram.svg' ); ?>" alt="telegram">
	<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/whatsapp.svg' ); ?>" alt="whatsapp">
	<a href="tel:<?php echo esc_attr( $tel_href_number ); ?>">
		<?php echo esc_html( $phone_number ); ?>
	</a>
</div>
