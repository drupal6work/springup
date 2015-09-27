<?php
   
  global $user;  
  $uid = arg(1);
  $account = user_load($uid);
  $weight = array(
    'profile_about_me',
    'profile_sales_promotions',
    'profile_my_work',
    'profile_offer',
    'profile_video_galary',
    'profile_awards_certificates',
    'profile_my_place',
    'profile_follow_me',
    'profile_my_section',  
    'user_profile_comments'
  );

  if(!empty($account->data['profile_view'])) {
    if(count($account->data['profile_view']) < 11) {
      foreach($weight as $value) {
        if(!in_array($value , $account->data['profile_view'])) {
          $account->data['profile_view'][] = $value;
        }
      }      
      user_save($account);
    }
    $weight = $account->data['profile_view'];
  }else {    
    $account->data['profile_view'] = $weight;
    user_save($account);
  }
  $non_member = array(
    'profile_awards_certificates', 
    'profile_my_place', 
    'profile_sales_promotions', 
    'profile_video_galary',
    'profile_my_section'  
  );
  
  $title = array(
    'profile_my_work' => 'Photo Gallery',
    'profile_awards_certificates' => 'AWARDS, CERTIFICATES AND LICENCES',
    'profile_sales_promotions' => 'Ads and Promo',
    'profile_my_place' => t("&lt;Create your own section here&gt;"),
    'profile_video_galary' => 'Video Gallery',
    'profile_follow_me' => 'Follow Me',
    'profile_my_section' => t("&lt;Create your own section here&gt;"),  
  );
  //$weight = array_unique($weight);
  watchdog('PS', serialize($weight));
  hide($user_profile['user_picture']);
  hide($user_profile['field_publish_profile']);
  hide($user_profile['profile_others']);

?>
<?php print render($user_profile['profile_about_us']); ?>
<?php if (is_author(arg(1))) { ?>
  <p class="edit-this"> Drag & drop to re-arrange your profile sections and <strong>
      <span id="current-order" class="edit-link" style="cursor: pointer;"> 
       click here to save
      </span>
    </strong>
  </p>  
<?php } ?>

<div id="sortable">
  <?php if(!empty($weight)) { ?>
    <?php foreach($weight as $key => $field) { ?>
      <?php if(isset($user_profile[$field]) && _is_published($user_profile[$field], $field)) { ?>
        <?php print render($user_profile[$field]); ?>
      <?php } elseif(is_author(arg(1))  && !empty($field) ) { ?>
          <?php if(!is_member() && in_array($field, $non_member)) { ?>
            <?php continue; ?>
          <?php } ?>
          <section class="ui-state-default promo margin-bottom" data-name="<?php print $field; ?>">
            <div class="container white">
              <h1 class="sprinUp-title prfile-title" style="cursor: crosshair;">
                <?php print $title[$field]; ?>                
                <span class="pull-right edit-link" style="font-size:14px;">
                  <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/' . substr($field, 8), 
                          array('query' => array('destination' => 'user'))); ?>
                </span>                
              </h1>                
            </div>
          </section>
      <?php } ?>
    <?php } ?>
  <?php } else { ?>
    <?php print render($user_profile); ?>
  <?php } ?>
</div>