<?php
/*
Plugin Name:   WP H-Guestbook
Plugin URI:    https://github.com/m266/wp-h-guestbook
Description:   Gästebuch auf Grundlage der Kommentarfunktion
Author:        Hans M. Herbrand
Author URI:    https://www.web266.de
Version:       1.2.0
Date:          2019-02-07
License:       GNU General Public License v2 or later
License URI:   http://www.gnu.org/licenses/gpl-2.0.html
GitHub Plugin URI: https://github.com/m266/wp-h-guestbook
 */
// Externer Zugriff verhindern
defined('ABSPATH') || exit();

// Plugin defined, GitHub einbinden (Plugin-Name im Meldungstext anpassen)
require_once 'inc/wphgb_plugin_defined_github.php';

// Option Page
class WPHGB {
    private $wphgb_options;

    public function __construct() {
        add_action('admin_menu', array($this, 'wphgb_add_plugin_page'));
        add_action('admin_init', array($this, 'wphgb_page_init'));
    }

    public function wphgb_add_plugin_page() {
        add_menu_page(
            'WP-H-Guestbook', // page_title
            'WP-H-Guestbook', // menu_title
            'manage_options', // capability
            'wphgb', // menu_slug
            array($this, 'wphgb_create_admin_page'), // function
            'dashicons-book', // icon_url
            81// position
        );
    }

    public function wphgb_create_admin_page() {
        $this->wphgb_options = get_option('wphgb_option_name');?>

        <div class="wrap">
        <h2>
                    <?php
// Plugin-Name und Versions-Nummer ermitteln
        function wphgb_plugin_name_get_data() {
            $wphgb_plugin_data = get_plugin_data(__FILE__);
            $wphgb_plugin_name = $wphgb_plugin_data['Name'];
            $wphgb_plugin_version = $wphgb_plugin_data['Version'];
            $wphgb_plugin_name_version = $wphgb_plugin_name . " " .
                $wphgb_plugin_version;
            return $wphgb_plugin_name_version;
        }
        $wphgb_plugin_name_version = wphgb_plugin_name_get_data();
        echo $wphgb_plugin_name_version . " > " . "Einstellungen"; // Plugin-Name und Versions-Nummer ausgeben
        ?>
</h2>
<div class="card">
        <h3><b>(Das Plugin ist auf <a href="https://web266.de/software/eigene-plugins/wp-h-guestbook/" target="_blank">web266.de</a> detailliert beschrieben)<br>
        <a href="https://web266.de/software/eigene-plugins/wp-h-guestbook/kurzanleitung/" target="_blank"><br>Kurzanleitung...</a></h3></b>
            <hr>
            <?php settings_errors();?>

            <form method="post" action="options.php">
                <?php
settings_fields('wphgb_option_group');
        do_settings_sections('wphgb-admin');
        submit_button();
        ?>
            </form>
        </div>
        </div>
<!-- Meldung ausgeben, wenn Seiten-ID des Gästebuchs fehlt -->
<?php require_once 'inc/wphgb_missing_page_id.php';?>
    <?php
}

    public function wphgb_page_init() {
        register_setting(
            'wphgb_option_group', // option_group
            'wphgb_option_name', // option_name
            array($this, 'wphgb_sanitize') // sanitize_callback
        );

        add_settings_section(
            'wphgb_setting_section', // id
            'Settings', // title
            array($this, 'wphgb_section_info'), // callback
            'wphgb-admin' // page
        );

        add_settings_field(
            'seiten_id_0', // id
            'Seiten-ID der G&auml;stebuchseite', // title
            array($this, 'seiten_id_0_callback'), // callback
            'wphgb-admin', // page
            'wphgb_setting_section' // section
        );

        add_settings_field(
            'eigener_css_code_1', // id
            'Eigener CSS-Code (optionale Eingabe)', // title
            array($this, 'eigener_css_code_1_callback'), // callback
            'wphgb-admin', // page
            'wphgb_setting_section' // section
        );
    }

    public function wphgb_sanitize($input) {
        $sanitary_values = array();
        if (isset($input['seiten_id_0'])) {
            $sanitary_values['seiten_id_0'] = sanitize_text_field(
                $input['seiten_id_0']);
        }

        if (isset($input['eigener_css_code_1'])) { // Keine PHP/HTML-Tags erlaubt
            $sanitary_values['eigener_css_code_1'] = strip_tags(
                $input['eigener_css_code_1']);
        }

        return $sanitary_values;
    }

    public function wphgb_section_info() {
    }

    public function seiten_id_0_callback() { // Nur Ziffern erlaubt
        printf(

            '<input class="regular-text" type="number" name="wphgb_option_name[seiten_id_0]" id="seiten_id_0" value="%s" required>',
            isset($this->wphgb_options['seiten_id_0']) ? esc_attr($this
                    ->wphgb_options['seiten_id_0']) : ''
            );
        }

        public function eigener_css_code_1_callback() {
            printf(

                '<textarea class="large-text" rows="5" name="wphgb_option_name[eigener_css_code_1]" id="eigener_css_code_1">%s</textarea>',
                isset($this->wphgb_options['eigener_css_code_1']) ? esc_attr(
                $this->wphgb_options['eigener_css_code_1']) : ''
        );
    }
}
if (is_admin()) {
    $wphgb = new WPHGB();
}

/*
 * Retrieve this value with:
 * $wphgb_options = get_option( 'wphgb_option_name' ); // Array of All Options
 * $seiten_id_0 = $wphgb_options['seiten_id_0']; // Seiten-ID
 * $eigener_css_code_1 = $wphgb_options['eigener_css_code_1']; // Eigener CSS-Code
 */

?>
<?php
// CSS und eigener CSS-Code einbinden
require_once 'inc/wphgb_css.php';
// Formular einbinden
require_once 'inc/wphgb_form.php';
// Eintrag für At a glance einbinden
require_once 'inc/wphgb_at_a_glance.php';
?>