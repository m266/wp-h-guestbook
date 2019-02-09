<?php
// Plugin defined, GutHub einbinden (Plugin-Name im Meldungstext anpassen)
// Makes sure the plugin is defined before trying to use it
if (!function_exists('is_plugin_active')) {
    require_once ABSPATH . '/wp-admin/includes/plugin.php';
}
// Makes sure the plugin is defined before trying to use it
if (!function_exists('is_plugin_inactive')) {
    require_once ABSPATH . '/wp-admin/includes/plugin.php';
}

// GitHub-Updater inaktiv?
if (is_plugin_inactive('github-updater/github-updater.php')) {
    // Plugin ist inaktiv
    // Plugin-Name im Meldungstext anpassen
    function wphgb_missing_github_updater_notice() {; // GitHub-Updater fehlt

        ?>
    <div class="error notice">  <!-- Wenn ja, Meldung ausgeben -->
        <p><?php _e('Bitte das Plugin <a href="https://www.web266.de/tutorials/github/github-updater/" target="_blank">
        <b>"GitHub-Updater"</b></a> herunterladen, installieren und aktivieren.
        Ansonsten werden keine weiteren Updates f&uuml;r das Plugin <b>"WP H-Guestbook"</b> bereit gestellt!');?></p>
    </div>
                        <?php
}
    add_action('admin_notices', 'wphgb_missing_github_updater_notice');
}
?>