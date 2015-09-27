<?php
 $address = array();
 
 if(empty($content['field_role_occupation'])){
   $address[] = 'Not Available';
 }else{
   $address[] = render($content['field_role_occupation']);
 }
 
 if(empty($content['field_business_name'])){
   $address[] = 'Not Available';
 }else{
   $address[] = render($content['field_business_name']);
 }
 
 
 
 //if(!empty($content['field_my_address']['#items'][0]['thoroughfare'])) {
 // $address[] =  $content['field_my_address']['#items'][0]['thoroughfare'];
 //}
 $loc = array();
 if(!empty($content['field_my_address']['#items'][0]['locality'])) {
  $loc[] =  $content['field_my_address']['#items'][0]['locality'];
 }
 if(!empty($content['field_my_address']['#items'][0]['administrative_area'])) {
  $state = $content['field_my_address'][0]['locality_block']['administrative_area']['#options'];
  $area = $content['field_my_address']['#items'][0]['administrative_area'];
  $loc[] =  $state[$area];
 }
 //if(!empty($content['field_my_address']['#items'][0]['country'])) { 
 // $key = $content['field_my_address']['#items'][0]['country'];
 // $address[] = $content['field_my_address'][0]['country']['#options'][$key];
 //}
  
 $location = '';
 if(!empty($address)) {
   $location = implode(', ', $address);  
 }
 if(!empty($loc)) {
   $location .= ' - ' . implode(', ', $loc);
 }
 global $user;
?>
<!--user content-->
<section class="user-detail margin-bottom">
  <div class="container">
	<?php if(is_author(arg(1))) { ?>
	  <span class="pull-right edit-link"><?php print l(t('Edit'), 'user/' . arg(1) . '/edit/about_us', array('query' => array('destination' => 'user'))); ?></span>
	<?php } ?>
    <div class="row grey lighten-1">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 user-left">
        <?php print render($content['field_user_avatar']); ?>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 user-right">
        <div class="user-right-top">
          <h2 class="sprinUp-title">
			<?php print render($content['field_user_name']); ?>
		    
		  </h2>
          <span class="">
            <em>
              <?php // print render($content['field_role_occupation']); ?>
              <?php // print render($content['field_business_name']); ?>                              
              <?php print $location; ?>
            </em>
          </span>
          <p></p>
          <?php print render($content['field_summery']); ?>
          <div class="user-right-bottom">
            <div class="row">
              <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <span id="profile-like">
                  <?php print render($content['profile_like']); ?>
                </span>
                <?php print view_favorites(); ?>
              </div>
              <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 text-right">
              <?php  if(user_is_logged_in() && $user->uid != arg(1)) { ?>
              
                <a class="btn btn-info contact">Contact</a>
                <a class="btn btn-warning message" id="message">Book Now</a>                
              
              <?php }else { ?>
                <a class="btn btn-info" href="<?php print url('user/login'); ?>">Contact</a>
                <a class="btn btn-warning message" href="<?php print url('user/login'); ?>">Book Now</a> 
              <?php } ?>
              </div>  
              <!--???????????Message Modal??????????-->
              <!-- Modal -->
              <div class="modal fade" id="messageModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4><span class="glyphicon glyphicon-envelope"></span> Book Now</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                      <?php
                        
                        module_load_include('inc', 'privatemsg', 'privatemsg.pages');
                        $form_id = 'privatemsg_new';
                        $form = drupal_get_form($form_id);                        
                        print drupal_render($form);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--???????????Message Modal End??????????-->
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!--user content end-->
















  <?php
    hide($content['field_about_image']);
    hide($content['field_about_me']);
    hide($content['field_offer_image']);
    hide($content['field_we_offer']);
  ?>

