<?php
  $uid = arg(1);
  $u = user_load($uid);
  $email = '<p class="form-control-static">' . $u->mail . '</p>';
  $em = array();
  if(!empty($content['field_business_email']['#items'][0]['email'])) {
    $email = '';
    foreach($content['field_business_email']['#items'] as $k => $m) {
      $email .= '<p class="form-control-static">' . $m['email'] . '</p>' ;
    }    
  }
  $socialPath = base_path() . drupal_get_path('module', 'socialfield') .'/css/socialfield.css';
?>
<link href="<?php print $socialPath ?>" rel="stylesheet">
<!--follow-me and other section-->
<section id="follow-me" class="ui-state-default follow-me margin-bottom" data-name="profile_follow_me">
  <div class="container">
    <div class="row">
      <div class="col-md-6 white">
        <h3 class="sprinUp-title prfile-title folls-wa2" style="cursor: crosshair;">
          Follow Me 
          <?php if (is_author(arg(1))) { ?>
              <span class="pull-right edit-link" style="font-size: 14px;">
                <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/follow_me', array('query' => array('destination' => 'user'))); ?>
              </span>
            <?php } ?>
        </h3>
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">Phone <i class="fa fa-phone"></i></label>
            <div class="col-sm-9">
              <p class="form-control-static">
                <?php 
                  $phone = $content['field_business_address']['#items'][0]['phone_number'];
                  print render($content['field_business_address']['#items'][0]['phone_number']); 
                ?>
              </p>
              <p class="form-control-static">
                <?php
                  $mobile = $content['field_business_address']['#items'][0]['mobile_number'];
                  print render($content['field_business_address']['#items'][0]['mobile_number']); 
                ?>
              </p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Email <i class="fa fa-envelope"></i></label>
            <div class="col-sm-9">							    
              <?php print $email; ?>
            </div>
            <div id="popup-contact" style="display:none;">
               Phone: <i class="fa fa-phone"></i> <?php print $phone; ?><br>Mobile: <i class="fa fa-mobile"></i> <?php print $mobile; ?><br> E-Mail:<i class="fa fa-envelope"></i> <?php print $email; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Website <i class="fa fa-globe"></i></label>
            <div class="col-sm-9">
              <p class="form-control-static">
                <?php $url = $content['field_website']['#items'][0]['url']; ?>
                <a href="<?php print $url; ?>" ><?php print $url; ?></a>
              </p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Address <i class="fa fa-map-marker"></i></label>
            <div class="col-sm-9">
              <p class="form-control-static"><?php print $content['field_business_address']['#items'][0]['thoroughfare']; ?></p>
              <p class="form-control-static">
                <?php print $content['field_business_address']['#items'][0]['locality'] . ' ' . $content['field_business_address']['#items'][0]['postal_code'] . ' ' . $content['field_business_address']['#items'][0]['administrative_area']; ?>
              </p>
            </div>
          </div>
          <span id="socialfield-table" class="block-follow-section form-group">
					 <label class="col-sm-3 control-label">Social <i class="fa fa-share-square-o"></i></label>
            <span class="social-links col-sm-9">
          <?php
           if(!empty($content['field_social_presence']['#items']) && is_array($content['field_social_presence']['#items'])) {
            foreach($content['field_social_presence']['#items'] as $social) {
              echo '<span class="'.$social['class'][1].'">';
              echo $social['data'];
              echo '</span>';
            } 
           }
          ?>
            </span>
          </span>  
        </div>
      </div>
      <?php
        $others = profile2_load_by_user($u, 'others');
      ?>
      <div class="col-md-6 last-f2s">
        <div class="row white margin-bottom">
          <h3 class="sprinUp-title prfile-title" style="cursor: crosshair;">
            Locations 
            <?php if (is_author(arg(1))) { ?>
                <span class="pull-right edit-link" style="font-size: 14px;">
                  <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/others', array('query' => array('destination' => 'user'))); ?>
                </span>
              <?php } ?>
          </h3>
          <div class="col-md-6 follow-locations">
            <p><?php print $others->field_locations['und'][0]['value']; ?></p>
          </div>
        </div>
        <div class="row white">
          <h3 class="sprinUp-title prfile-title" style="cursor: crosshair;">
            Payment Accepted
            <?php if (is_author(arg(1))) { ?>
                <span class="pull-right edit-link" style="font-size: 14px;">
                  <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/others', array('query' => array('destination' => 'user'))); ?>
                </span>
              <?php } ?>
          </h3>
          <div class="col-md-6 payment-acc">
            <?php if (!empty($others->field_payment['und'])) { ?>
                <?php foreach ($others->field_payment['und'] as $k => $val) { ?>
                  <p><?php print $val['value']; ?></p>
                <?php } ?>
              <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
