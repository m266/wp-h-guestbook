<?php

/*
Plugin Name:   WP H-Guestbook
Plugin URI:    https://github.com/m266/wp-h-guestbook
Description:   Gästebuch auf Grundlage der Kommentarfunktion
Author:        Hans M. Herbrand
Author URI:    https://www.web266.de
Version:       1.1.2
Date:          2017-11-28
License:       GNU General Public License v2 or later
License URI:   http://www.gnu.org/licenses/gpl-2.0.html
*/
// Externer Zugriff verhindern
defined('ABSPATH') || exit();

/* Plugin-Updater */
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker('https://github.com/m266/wp-h-guestbook', __FILE__, 'wp-h-guestbook');
// Add settings link on plugin page
function wphgb_plugin_settings_link($links) {
  $settings_link = '<a href="options-general.php?page=wp-h-guestbook">Einstellungen</a>';
  array_unshift($links, $settings_link);
  return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'wphgb_plugin_settings_link');
// Admin-Menu
add_action('admin_menu', 'wphgb_add_admin_menu');
add_action('admin_init', 'wphgb_settings_init');
function wphgb_add_admin_menu() {
  add_menu_page('WP H-Guestbook', 'WP H-Guestbook', 'manage_options', 'wp-h-guestbook', 'wphgb_options_page', 'dashicons-book-alt');
  add_submenu_page('wp-h-guestbook', 'WP H-Guestbook', 'Einstellungen', 'manage_options', 'wp-h-guestbook', 'wphgb_options_page');
}
function wphgb_settings_init() {
  register_setting('wphgb', 'wphgb_settings');
  add_settings_section('wphgb_section', __('', 'wordpress'), 'wphgb_settings_section_callback', 'wphgb');
  add_settings_field('wphgb_text_field_0', __('Seiten-ID', 'wordpress'), 'wphgb_text_field_0_render', 'wphgb', 'wphgb_section');
}
function wphgb_text_field_0_render() {
  $options = get_option('wphgb_settings');
  ?>
  <input type='text' name='wphgb_settings[wphgb_text_field_0]'
            <?php
            $isChecked = !empty($options['wphgb_text_field_0']); // Notice: Undefined index (leere Variable) beseitigt
            checked($isChecked, 1);
            ?>
   value='<?php echo $options['wphgb_text_field_0']; ?>'>
          <?php
        }
        // Meldung ausgeben, wenn Seiten-ID des Gästebuchs fehlt
        $options = get_option('wphgb_settings');
        if (empty($options['wphgb_text_field_0'])) {
          function creation_missing_page_id_notice() { // Fehlt die Seiten-ID?
            ?>
    <div class="error notice">  <!-- Wenn ja, Meldung ausgeben -->
        <p><?php _e('Bitte die Seiten-ID der G&auml;stebuch-Seite im Plugin <a href="admin.php?page=wp-h-guestbook"><b>"WP H-Guestbook"</b></a> eingeben!'); ?></p>
    </div>
                        <?php
                      }
                      add_action('admin_notices', 'creation_missing_page_id_notice');
                    }
                    function wphgb_settings_section_callback() {
                    //  echo __('Bitte die Seiten-ID der Gästebuch-Seite eingeben (siehe Kurzanleitung unten):', 'wordpress');  // Ersetzt durch Admin Notice (siehe oben)
                    }
                    function wphgb_options_page() {
                      ?>
  <?php settings_errors(); ?> <!-- Meldung ausgeben -->
<!-- Eingabeformular für die Optionen -->
<form action='options.php' method='post'>
<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
<h2>
          <?php
        // Plugin-Name und Versions-Nummer ermitteln
          function wpht_plugin_name_get_data() {
            $wpht_plugin_data = get_plugin_data(__FILE__);
            $wpht_plugin_name = $wpht_plugin_data['Name'];
            $wpht_plugin_version = $wpht_plugin_data['Version'];
            $wpht_plugin_name_version = $wpht_plugin_name . " " . $wpht_plugin_version;
            return $wpht_plugin_name_version;
          }
          $wpht_menu_name_version = wpht_plugin_name_get_data();
          echo $wpht_menu_name_version . " > " . "Einstellungen"; // Plugin-Name und Versions-Nummer ausgeben
          ?>
</h2>
<div class="card">
          <?php
          settings_fields('wphgb');
          do_settings_sections('wphgb');
          submit_button();
          ?>
</form>
</div>
          <?php
        // Hilfe-Seite einbinden
          require_once ('admin/wphgb_help.php');
        }
        ?>
<?php
// CSS für Gästebuch einbinden
require_once ('admin/wphgb_css.php');
// Formular einbinden
require_once ('admin/wphgb_form.php');
// Eintrag für At a glance einbinden
require_once ('admin/wphgb_at_a_glance.php');
?>