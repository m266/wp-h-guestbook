<?php
// Gaestebuch-Formular
function wphgb_form_function() {
  ?>
<div id="gb-comments" class="gb-comments-area">  <!-- GB-Class -->
<!-- Begin Guestbook form -->
    <?php
    $comments_args = array('title_reply' => 'G&auml;stebucheintrag hinzuf&uuml;gen', 'comment_notes_before' => '<p class="comment-notes">Die E-Mail-Adresse wird nicht ver&ouml;ffentlicht. Erforderliche Felder sind markiert <span class="required">*</span>', 'comment_notes_after' => '', // HTML-Codes nicht anzeigen
    'comment_notes_after' => '', 'label_submit' => 'Senden', // Absende-Button beschriften
    'comment_field' => '<p class="comment-form-comment"><label for="comment">Nachricht</label><br /><textarea id="comment" name="comment"></textarea></p>');
    comment_form($comments_args);
    ?>
<br />
<hr />
<br />
<!-- End Guestbook form -->
<!--  <?php if (have_comments()) : ?>  -->
    <h2 class="comments-title">
              <?php
              $comments_number = get_comments_number();
              if (1 === $comments_number) {

          /* translators: %s: post title */
                printf(_x('One thought on &ldquo;%s&rdquo;', 'comments title', 'twentysixteen'), get_the_title());
              }
            else {
              printf(

          /* translators: 1: number of comments, 2: post title */
              _nx('Ein Eintrag im %2$s', '%1$s Eintr&auml;ge im %2$s', $comments_number, 'comments title', 'twentysixteen'), number_format_i18n($comments_number), get_the_title());
            }
            ?>
    </h2>
  <?php endif; // Check for have_comments(). ?>
</div><!-- .comments-area -->
    <?php
  }
  add_shortcode('wphgb_form', 'wphgb_form_function');
  ?>