<?php
// Gästebuch-Formular
function wphgb_form_function() {
    ob_start(); // Erforderlich, um Text über Shortcode einzufügen
    ?>
<div id="gb-comments" class="gb-comments-area">  <!-- GB-Class -->
<!-- Guestbook form -->
        <?php
$comments_args = array('title_reply' =>
        'G&auml;stebucheintrag hinzuf&uuml;gen', 'comment_notes_before' =>
        '<p class="comment-notes">Die E-Mail-Adresse wird nicht ver&ouml;ffentlicht. Erforderliche Felder sind markiert <span class="required">*</span>', 'comment_notes_after' => '', // HTML-Codes nicht anzeigen
        'comment_notes_after' => '', 'label_submit' => 'Senden', // Absende-Button beschriften
        'comment_field' =>
        '<p class="comment-form-comment"><label for="comment">Nachricht</label><br /><textarea id="comment" name="comment"></textarea></p>');
    ?>
        <?php
comment_form($comments_args);
    ?>
</div>  <!-- End GB-Class -->
        <?php
// Anzahl GB-Einträge einbinden
    require_once 'wphgb_view_count.php';
    return ob_get_clean(); // Erforderlich, um Text ueber Shortcode einzufuegen
}
add_shortcode('wphgb_form', 'wphgb_form_function');
?>