<?php
// Anzahl GB-Einträge einfügen
function wphgb_view_count() {
    ?>
    <h2 class=".gb-count">
                <?php
global $gb_count;
// GB-Einträge zählen
    global $gb_id;
    $comments_count = wp_count_comments($gb_id);
    $gb_count = $comments_count->approved; // Nur aktive GB-Einträge zählen

    // GB-Einträge anzeigen
    if ($gb_count == '') {
        echo 'Kein Eintrag im G&auml;stebuch';
    }
    if ($gb_count == '1') {
        echo 'Ein Eintrag im G&auml;stebuch';
    }
    if ($gb_count > '1') {
        echo 'Eintr&auml;ge im G&auml;stebuch: ' . $gb_count;
    }
    ?>
    </h2>
            <?php
}
wphgb_view_count();
?>