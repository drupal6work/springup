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
<!--WhatDoIOffer section-->
<section class="ui-state-default aboutMe margin-bottom" data-name="profile_offer">
  <div class="container white">
    <h1 class="sprinUp-title prfile-title" style="cursor: crosshair;">
      <?php print 'Products and Services'; ?>
      <?php if (is_author(arg(1))) { ?>
          <span class="pull-right edit-link" style="font-size:14px;">
            <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/about_us', array('query' => array('destination' => 'user'))); ?>
          </span>
        <?php } ?>
    </h1>
    <div class="row margin-bottom">
      <div class="col-xs-12 col-sm-3 col-md-3">
        <?php print render($elements['view']['field_offer_image'][0]); ?>  
      </div>
      <div class="col-xs-12 col-sm-9 col-md-9">
        <?php print render($elements['view']['field_we_offer'][0]); ?>
      </div>
    </div>
  </div>
</section>
<!--WhatDoIOffer end-->