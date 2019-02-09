<?php
// Meldung ausgeben, wenn Seiten-ID des Gästebuchs fehlt
$wphgb_options = get_option('wphgb_option_name'); // Array of All Options
if (empty($wphgb_options['seiten_id_0'])) {
    function wphgb_missing_page_id_notice() {?>
    <div class="error notice">
        <p><?php _e(
        'Bitte die Seiten-ID der G&auml;stebuch-Seite im Plugin <b>"WP H-Guestbook"</b></a> eingeben!', 'my-text-domain');?></p>
    </div>
    <?php
}
    add_action('load-index.php', // Meldung auf der Index-Seite im Dashboard zusätzlich anzeigen
        function () {
            add_action('admin_notices', 'wphgb_missing_page_id_notice');
        }
    );
    function wphgb_missing_page_id_notice2() {?>
    <div class="error notice">
        <p><?php _e(
        'Bitte die Seiten-ID der G&auml;stebuch-Seite im Plugin <b>"WP H-Guestbook"</b></a> eingeben!', 'my-text-domain');?></p>
    </div>
    <?php
}
    add_action('load-plugins.php', // Meldung auf der Plugin-Seite im Dashboard zusätzlich anzeigen
        function () {
            add_action('admin_notices', 'wphgb_missing_page_id_notice2');
        }
    );
}
?>