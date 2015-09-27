<?php 
  //each file loads it's own styles because we cant predict which file will be loaded 
  drupal_add_css(drupal_get_path('module', 'privatemsg').'/styles/privatemsg-recipients.css');
?>
<h4 class="message-head">
  <?php print $participants; ?>
</h4>