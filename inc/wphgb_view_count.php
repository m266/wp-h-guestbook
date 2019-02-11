<?php
// Anzahl GB-Einträge einfügen
function wphgb_view_count() {
    ?>
    <h2 class=".gb-count">
                <?php
global $gb_count;
    // Anzahl GB-Einträge einbinden
    require_once 'wphgb_inc_count.php';
    $gb_count = $comments_count->approved; // Nur aktive GB-Einträge zählen
    // GB-Einträge anzeigen
    if ($gb_count == '') {
        echo 'Kein Eintrag im G&auml;stebuch';
    }
    if ($gb_count == 1) {
        echo 'Ein Eintrag im G&auml;stebuch';
    }
    if ($gb_count > 1) {
        echo $gb_count . ' Eintr&auml;ge im G&auml;stebuch';
    }
    ?>
    </h2>
            <?php
}
wphgb_view_count();
?>