<?php

function boot_save_options() {
	if ( ! current_user_can( 'publish_pages' ) ) {
		wp_die( 'Vous n\'êtes pa autorisé à effectuer cette opération' );
	}
	check_admin_referer( 'boot_options_verify' );
	$opts              = get_option( 'boot_opts' );
	$opts['legend_01'] = sanitize_text_field( $POST["boot_legend_01"] );

	update_option( 'boot_opts', $opts );

	wp_redirect( admin_url( 'admin.php?page=boot_theme_opts&status=1' ) );
	exit;
}

?>