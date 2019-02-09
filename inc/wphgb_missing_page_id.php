<?php
// Meldung ausgeben, wenn Seiten-ID des Gästebuchs fehlt
$wphgb_options = get_option('wphgb_option_name'); // Array of All Options
if (empty($wphgb_options['seiten_id_0'])) {
    ?>
    <div class="error notice">  <!-- Wenn ja, Meldung ausgeben -->
        <p><?php _e('Bitte die Seiten-ID der G&auml;stebuch-Seite im Plugin <b>"WP H-Guestbook"</b></a> eingeben!');?></p>
    </div>
<?php
}
?>