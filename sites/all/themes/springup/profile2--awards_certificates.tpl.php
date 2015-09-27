<!--testimonial slider-->
<section class="ui-state-default promo margin-bottom" data-name="profile_awards_certificates">
  <div class="container white">
    <h1 class="sprinUp-title prfile-title" style="cursor: crosshair;">
      <?php print 'AWARDS, CERTIFICATES AND LICENCES'; ?>
      <?php if (is_author(arg(1))) { ?>
          <span class="pull-right edit-link" style="font-size: 14px;">
            <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/awards_certificates', array('query' => array('destination' => 'user'))); ?>
          </span>
        <?php } ?>
    </h1>
    <div class="row">
      <div class="col-md-12">
        <div id="award-slider" class="owl-carousel owl-theme">
          <?php
            foreach ($content['field_awards_certificates'] as $key => $collection) {
              if (is_numeric($key)) {
                foreach ($collection['entity']['field_collection_item'] as $k => $fields) {
                  ?>
                  <div class="item">
                    <div class="testimonial-item">
                      <div class="post-image pull-left margin-right">
                        <?php print render($fields['field_award_image'][0]); ?>
                      </div>
                      <div class="latest-description">                        
                          <?php print render($fields['field_about_award'][0]); ?>
                      </div>
                    </div>
                  </div>  
                <?php
                }
              }
            }
          ?>     
        </div>        
      </div>
    </div>
  </div>
</section>
