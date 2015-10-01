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
<style>
.embedded-video {
  position:relative;
  padding-bottom:56.25%;
  padding-top:30px;
  height:0;
  overflow:hidden;
}

.embedded-video iframe, 
.embedded-video object, 
.embedded-video embed {
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
}
</style>
<!--promo slider-->
<section class="ui-state-default promo margin-bottom" data-name="profile_video_galary">
  <div class="container white">
    <h1 class="sprinUp-title prfile-title" style="cursor: crosshair;">
      <?php print "Video Gallery"; ?>
      <?php if (is_author(arg(1))) { ?>
          <span class="pull-right edit-link" style="font-size: 14px;">
            <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/video_galary', array('query' => array('destination' => 'user'))); ?>
          </span>
        <?php } ?>
    </h1>
    <div id="owl-video" class="owl-carousel owl-theme">
      <?php
	    if(!empty($content['field_show_case'])) {
			foreach ($content['field_show_case'] as $key => $video) {
			  if (is_numeric($key)) {
				print '<div class="item">' . render($video) . '</div>';
			  }
			}
		}
      ?>
    </div>
  </div>
</section>
<!--promo slider end-->
