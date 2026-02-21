<?php
/**
 * Theme Settings – admin menu and settings page
 *
 * @package Arhikad
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Theme Settings to the admin menu (top-level, like Plugins / Users).
 */
function arhikad_add_theme_settings_menu() {
	add_menu_page(
		__( 'Theme Settings', 'arhikad' ),
		__( 'Theme Settings', 'arhikad' ),
		'manage_options',
		'arhikad-theme-settings',
		'arhikad_theme_settings_page',
		'dashicons-admin-customizer',
		61
	);
}

/** Option keys in wp_options. */
const ARHIKAD_OPTION_PHONE   = 'arhikad_phone_number';
const ARHIKAD_OPTION_ADDRESS = 'arhikad_address';
const ARHIKAD_OPTION_EMAIL   = 'arhikad_email';

/**
 * Save Theme Settings form.
 */
function arhikad_save_theme_settings() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	if ( ! isset( $_POST['arhikad_theme_settings_nonce'], $_GET['page'] ) || 'arhikad-theme-settings' !== $_GET['page'] ) {
		return;
	}
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['arhikad_theme_settings_nonce'] ) ), 'arhikad_theme_settings' ) ) {
		return;
	}
	if ( isset( $_POST['arhikad_phone_number'] ) ) {
		update_option( ARHIKAD_OPTION_PHONE, sanitize_text_field( wp_unslash( $_POST['arhikad_phone_number'] ) ) );
	}
	if ( isset( $_POST['arhikad_address'] ) ) {
		update_option( ARHIKAD_OPTION_ADDRESS, sanitize_text_field( wp_unslash( $_POST['arhikad_address'] ) ) );
	}
	if ( isset( $_POST['arhikad_email'] ) ) {
		update_option( ARHIKAD_OPTION_EMAIL, sanitize_email( wp_unslash( $_POST['arhikad_email'] ) ) );
	}
	wp_safe_redirect( add_query_arg( 'settings-updated', 'true', wp_get_referer() ) );
	exit;
}

add_action( 'admin_init', 'arhikad_save_theme_settings' );

/**
 * Render the Theme Settings admin page.
 */
function arhikad_theme_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$phone_number = get_option( ARHIKAD_OPTION_PHONE, '' );
	$address      = get_option( ARHIKAD_OPTION_ADDRESS, '' );
	$email        = get_option( ARHIKAD_OPTION_EMAIL, '' );

	if ( isset( $_GET['settings-updated'] ) && 'true' === $_GET['settings-updated'] ) {
		echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Settings saved.', 'arhikad' ) . '</p></div>';
	}
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<form method="post" action="">
			<?php wp_nonce_field( 'arhikad_theme_settings', 'arhikad_theme_settings_nonce' ); ?>

			<table class="form-table" role="presentation">
				<tr>
					<th scope="row">
						<label for="arhikad_phone_number"><?php esc_html_e( 'Phone number', 'arhikad' ); ?></label>
					</th>
					<td>
						<input type="text" name="arhikad_phone_number" id="arhikad_phone_number" value="<?php echo esc_attr( $phone_number ); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="arhikad_address"><?php esc_html_e( 'Address', 'arhikad' ); ?></label>
					</th>
					<td>
						<input type="text" name="arhikad_address" id="arhikad_address" value="<?php echo esc_attr( $address ); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="arhikad_email"><?php esc_html_e( 'Email', 'arhikad' ); ?></label>
					</th>
					<td>
						<input type="email" name="arhikad_email" id="arhikad_email" value="<?php echo esc_attr( $email ); ?>" class="regular-text" />
					</td>
				</tr>
			</table>

			<?php submit_button( __( 'Save', 'arhikad' ) ); ?>
		</form>
	</div>
	<?php
}

add_action( 'admin_menu', 'arhikad_add_theme_settings_menu' );
