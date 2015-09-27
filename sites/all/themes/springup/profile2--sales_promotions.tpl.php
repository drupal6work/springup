<?php
  /**
   * @file
   * Default theme implementation for profiles.
   *
   * Available variables:
   * - $content: An array of comment items. Use render($content) to print them all, or
   *   print a subset such as render($content['field_example']). Use
   *   hide($content['field_example']) to temporarily suppress the printing of a
   *   given element.
   * - $title: The (sanitized) profile type label.
   * - $url: The URL to view the current profile.
   * - $page: TRUE if this is the main view page $url points too.
   * - $classes: String of classes that can be used to style contextually through
   *   CSS. It can be manipulated through the variable $classes_array from
   *   preprocess functions. By default the following classes are available, where
   *   the parts enclosed by {} are replaced by the appropriate values:
   *   - entity-profile
   *   - profile-{TYPE}
   *
   * Other variables:
   * - $classes_array: Array of html class attribute values. It is flattened
   *   into a string within the variable $classes.
   *
   * @see template_preprocess()
   * @see template_preprocess_entity()
   * @see template_process()
   */
?>
<!--promo slider-->
<section class="ui-state-default promo margin-bottom" data-name="profile_sales_promotions">
  <div class="container white">
    <h1 class="sprinUp-title prfile-title" style="cursor: crosshair;">
<?php print "Ads and Promo"; ?>
      <?php if (is_author(arg(1))) { ?>
          <span class="pull-right edit-link" style="font-size: 14px;">
          <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/sales_promotions', array('query' => array('destination' => 'user'))); ?>

          </span>
  <?php } ?>
    </h1>
    <div id="owl-promo" class="owl-carousel owl-theme">
<?php
  foreach ($content['field_sales_promotions'] as $key => $collection) {
    if (is_numeric($key)) {
      foreach ($collection['entity']['field_collection_item'] as $k => $fields) {
        if (is_numeric($k)) {
          print '<div class="item">' . render($fields['field_promotion_image'][0]) . '</div>';
        }
      }
    }
  }
?>
    </div>
  </div>
</section>
<!--promo slider end-->