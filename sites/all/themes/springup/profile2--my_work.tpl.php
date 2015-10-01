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
<!--profileImage slider-->
<section class="ui-state-default images margin-bottom" data-name="profile_my_work">
  <div class="container white">
    <h1 class="sprinUp-title prfile-title" style="cursor: crosshair;">
      <?php print "Photo Gallery"; ?>
      <?php if (is_author(arg(1))) { ?>
          <span class="pull-right edit-link" style="font-size:14px;">
            <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/my_work', array('query' => array('destination' => 'user'))); ?>
          </span>
        <?php } ?>
    </h1>
    <div id="profileImage-slider" class="owl-carousel margin-bottom">
      <?php
        $count = 0;
		if(!empty($content['field_work_image'])) {
			foreach ($content['field_work_image'] as $key => $image) {
			  if (is_numeric($key)) {
				$count = $count + 1;
				$image['#image_style'] = 'my_work_slide';
				print '<div class="item">' . render($image) . '</div>';
			  }
			}
		}
        if ($count < 4) {
          $remain = 4 - $count;
          if ($remain > 0) {
            for ($i = 0; $i < $remain; $i++) {
              print '<div class="item"><img src="/sites/all/themes/springup/images/image.jpg"/></div>';
            }
          }
        }
      ?>
    </div>
  </div>
</section>
<!--profileImage slider end-->