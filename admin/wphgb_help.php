<h3><b>Kurzanleitung:</b></h3>
Im Dashboard unter Einstellungen -> Diskussion das Kommentieren global erlauben (Erlaube Besuchern, neue Beiträge zu kommentieren).<br>
In der Zeile "Bevor ein Kommentar erscheint, muss der Kommentar manuell genehmigt werden" das Häkchen setzen.<br>
Die Moderation der Kommentare wird aus Sicherheitsgründen empfohlen, das der Websitebetreiber für nicht erlaubte Links usw. haftbar gemacht werden kann.<br>
Eine Gästebuchseite, z. B. mit dem Namen "Gästebuch", erstellen.<br>
Unter "Ansicht anpassen" die Häkchen bei "Diskussion" und "Kommentare" setzen.<br>
In der Dialogbox "Kommentare erlauben" ebenfalls ein Häkchen setzen.<br>
Im großen Fenster des Editors folgenden Beispieltext hinzufügen:<br>
"Hinweis:<br>
Die Einträge werden erst nach einer Überprüfung freigeschaltet."<br>
Darunter den Shortcode zum Einfügen des Formulares setzen:<br>
<b>[wphgb_form]</b><br>
Die Seiten-ID aus der Adresszeile des Browser (ganz oben) ablesen. Beispiel:<br>
"post.php?post=13&action=edit"<br>
Die Seiten-ID lautet in diesem Fall: "13"<br>
Diesen Wert in der Einstellungs-Seite des Plugins im Feld "Seiten-ID" eintragen und dann den blauen Button "Änderungen übernehmen" drücken.<br>
Die Gästebuchseite aktualisieren und im Frontend aufrufen. Es sollte das Eingabeformular zu sehen sein.<br>
Wenn die Seiten-ID richtig eingetragen wurde, ist am Ende des Gästebuches KEIN weiteres Kommentar-Formular zusehen.<br> Einen Testeintrag vornehmen und den gesamten Ablauf prüfen. Danach den Testeintrag wieder löschen.
</p>