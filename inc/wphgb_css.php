<?php
// CSS nur im Gästebuch einbinden
// Seiten-Name aus Datenbank auslesen
$wphgb_options = get_option('wphgb_option_name'); // Array of All Options
$seiten_id_0 = $wphgb_options['seiten_id_0']; // Seiten-ID
$eigener_css_code_1 = $wphgb_options['eigener_css_code_1']; // Eigener CSS-Code
$options = get_option('wphgb_settings');
$wphgb_gb_page = $seiten_id_0;
// Seiten-Name der Gästebuch-Seite ermitteln
function wphgb_plugin_page_id() {
    global $wphgb_page_id;
    global $wphgb_gb_page;
    $wphgb_page_id = get_the_ID();
// Wenn ID von Gästebuch-Seite und ID aus DB gleich sind, dann CSS einbinden
    if ($wphgb_page_id == $wphgb_gb_page) {
// CSS einbinden
        function wphgb_css() {
            wp_register_style('wphgb_embed_css',
                plugins_url('wp-h-guestbook/css/wphgb.css')); // CSS-Datei einbinden
            wp_enqueue_style('wphgb_embed_css');
        }
        add_action('wp_enqueue_scripts', 'wphgb_css');
// Eigener CSS-Code einbinden
        function wphgb_custom_css() {
            global $eigener_css_code_1;
            ?>
<style>
<?php echo $eigener_css_code_1; ?>
</style>
<?php }
        add_action('wp_head', 'wphgb_custom_css');
    }
}
add_action('template_redirect', 'wphgb_plugin_page_id');
?>