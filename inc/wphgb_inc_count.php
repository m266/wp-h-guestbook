<?php
// GB-ID ermitteln
$options = get_option('wphgb_settings');
$gb_id = $options['wphgb_text_field_0'];
// GB-Einträge zählen
$comments_count = wp_count_comments($gb_id);
?>