<?php
// Credits: Torsten Landsiedel, http://torstenlandsiedel.de/2014/01/15/wordpress-gaestebuch/

/**
* Add locations to the new "At a glance" dashboard widget (WP 3.8+). *
* @param  array $items
* @return array
*/
// Fehlt GB-ID?
$options = get_option('wphgb_settings');
if (!empty($options['wphgb_text_field_0'])) { // Wenn Ja, keine Anzeige im Widget
  function add_to_glance(Array $items) {
// Anzahl GB-Einträge einbinden
    require_once ('wphgb_inc_count.php');
    $num = $comments_count->approved; // Nur aktive GB-Einträge zählen
// Singular or Plural.
    $text = '<span class="dashicons dashicons-book"></span> ' . _n('%s G&auml;stebucheintrag', '%s G&auml;stebucheintr&auml;ge', $num, 'tl-guestbook'); // Dash-Icon noch verbessern
// thousands separator etc.
    $text = sprintf($text, number_format_i18n($num));

/*
if ( current_user_can( "edit_post" ) )
{
$url  = admin_url( "edit-comments.php?comment_type=guestbook+comment" );
$text = "<a href='$url'>$text</a>";
}
*/
    $items[] = $text;
    return $items;
  }
  add_filter('dashboard_glance_items', 'add_to_glance');
}
?>