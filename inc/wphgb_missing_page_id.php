<?php
// Meldung ausgeben, wenn Seiten-ID des Gästebuchs fehlt
$options = get_option('wphgb_settings'); // Array of All Options
if (empty($options['wphgb_text_field_0'])) {
function wphgb_missing_page_id_error_notice() {
    ?>
    <div class="error notice">
        <p><?php _e( 'Bitte die Seiten-ID der G&auml;stebuch-Seite im Plugin<b>"WP H-Guestbook"</b></a> eingeben!' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'wphgb_missing_page_id_error_notice' );
}
?>