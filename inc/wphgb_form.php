<?php
// Gästebuch-Formular
// Eigener CSS-Code aus Datenbank auslesen
$wphgb_options = get_option('wphgb_option_name'); // Array of All Options
if(!empty($wphgb_options['eigener_css_code_1'])) {   // Admin notice beseitigt
$eigener_css_code_1 = ($wphgb_options['eigener_css_code_1']); // Eigener CSS-Code hinzufuegen
}
function wphgb_form_function() {
    global $eigener_css_code_1;
    global $gb_id;

// Gästebuch-ID ermitteln
    $gb_id = get_the_ID();

    ob_start(); // Erforderlich, um Text über Shortcode einzufügen
    ?>
<div id="gb-comments" class="gb-comments-area">  <!-- GB-Class -->
<style>
/* Eigener CSS-Code einbinden */
<?php echo $eigener_css_code_1; ?>
/* Kommentarformular ausblenden */
.gb-comments-area .comment-respond {
    display: block;
}
.comment-respond {
    display: none;
}
/* Antworten-Button ausblenden */
.reply {
    display: none;
}
/* Anzahl der Gaestebuch-Eintraege */
.gb-count {
    border-top-width: 2px;
    border-top-width: 0.125rem;
}
/* Titel der Kommentar-Liste ausblenden */
.comments-title {
    display: none;
}
</style>
<!-- Guestbook form -->
        <?php
$comments_args = array('title_reply' =>
        'G&auml;stebucheintrag hinzuf&uuml;gen', 'comment_notes_before' =>

        '<p class="comment-notes">Die E-Mail-Adresse wird nicht ver&ouml;ffentlicht. Erforderliche Felder sind markiert <span class="required">*</span>', 'comment_notes_after' => '', // HTML-Codes nicht anzeigen
        'comment_notes_after' => '', 'label_submit' => 'Senden', // Absende-Button beschriften
        'comment_field' =>

        '<p class="comment-form-comment"><label for="comment">Nachricht<span class="required"> *</span></label><br /><textarea id="comment" name="comment"></textarea></p>');
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