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
  global $user;
?>
<!--testimonial slider-->
<section class="ui-state-default promo margin-bottom" data-name="user_profile_comments">
  <div class="container white">
    <h1 class="sprinUp-title prfile-title" style="cursor: crosshair;">
      <?php print t('Recommendations'); ?>
    </h1>
    <div class="row">
      <div class="col-md-12">
        <div id="testimonial-slider" class="owl-carousel owl-theme">	
          <?php
            $index = 0;
            foreach ($elements['comments'] as $key => $comment) {
              $signature = array();
              $sign = '';
              if (is_numeric($key)) {
                $index = $index + 1;
                if (!empty($comment['comment_body']['#object']->uid)) {
                  $account = user_load($comment['comment_body']['#object']->uid);
                  $profile = profile2_load_by_user($account, 'about_us');
                  if (!empty($profile->field_user_name['und'][0]['value'])) {
                    $signature[] = $profile->field_user_name['und'][0]['value'];
                  }
                  if (!empty($profile->field_business_name['und'][0]['value'])) {
                    $signature[] = $profile->field_business_name['und'][0]['value'];
                  }
                  if (!empty($account->picture)) {
                    $uri = $account->picture->uri;
                  } elseif (variable_get('user_picture_default', '')) {
                    $uri = variable_get('user_picture_default', '');
                  }

                  $image = theme('image_style', array('style_name' => 'testimonial_image', 'path' => $uri));
                }
                if ($signature) {
                  $sign = implode(', ', $signature);
                }
                ?> 
                <div class="item">
                  <div class="testimonial-item">
                    <div class="post-image pull-left margin-right">
                      <?php print $image; ?>
                    </div>
                    <div class="latest-description">
                      <p><i class="fa fa-quote-left quote"></i> 
                      <?php print render($comment['comment_body']); ?></p>
                    </div>
                    <div class="test-userDetail pull-right">
                      <div><p>- <?php print $sign; ?></p></div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>          
                <?php
                    }
                  }
                ?>
        </div>
        <div class="testimonial-leave pull-right margin-bottom">
          <?php if (user_is_logged_in() && $user->uid != arg(1)) { ?>
              <button type="button" class="btn btn-info testimonials">Leave a Testimonial</button>
          <?php } elseif(!user_is_logged_in()) { ?>
              <a href="<?php print url('user/login'); ?>" class="btn btn-info">Leave a Testimonial</a>
          <?php } ?>   
        </div>
      </div>
      <?php if ($index > 1) { ?>
          <div class="col-md-12 text-center margin-bottom">
            <a class="btn goToPrev">
              <span class="glyphicon glyphicon-menu-left"></span>
              <span class="glyphicon glyphicon-menu-left"></span>
            </a>
            <a class="btn prev">
              <span class="glyphicon glyphicon-menu-left"></span>
            </a>
            <a class="btn next">
              <span class="glyphicon glyphicon-menu-right"></span>
            </a>
            <a class="btn goToNext">
              <span class="glyphicon glyphicon-menu-right"></span>
              <span class="glyphicon glyphicon-menu-right"></span>
            </a>
          </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="testimonialModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>
          <span class="glyphicon glyphicon-envelope"></span> 
<?php print t('Write Testimonials'); ?>
        </h4>
      </div>
      <div class="modal-body" style="padding:40px 50px;">
<?php print render($elements['comments']['comment_form']); ?>        
      </div>      
    </div>

  </div>
</div>
<!--???????????Message Modal End??????????-->
<!--testimonial slider end-->