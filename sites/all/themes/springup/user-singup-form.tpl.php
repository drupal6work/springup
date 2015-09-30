<?php
 $plan = unserialize($form['mark_plan']['#markup']); 
 $mobile_plan = unserialize($form['mark_mobile_plan']['#markup']); 
?>
<!--signUp page content-->
<div class="pricing-table">
  <div class="container">
    <div class="table-head">
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          <img class="img-responsive" src="<?php print base_path().path_to_theme()?>/images/table-logo.png" />
          <!--<br /> -->
          <h2 class="st-title hidden-xs">Step 1: Choose Your Plan</h2>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white hidden-xs">
          <strong class="text-uppercase titl-sp">
            <?php print $plan[2] ?>
          </strong> 
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center hidden-xs">
          <strong class="text-uppercase titl-sp">
            <?php print $plan[1] ?>
          </strong>
          <br>
        </div>
        <!--visible on small screen -->
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white visible-xs">
          <strong class="text-uppercase"><?php print $mobile_plan[2] ?></strong>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center visible-xs">
          <strong class="text-uppercase"><?php print $mobile_plan[1] ?></strong>
        </div>
        <!--visible on small screen end -->
      </div>
    </div>
    <div class="table-body">
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          Support, Recommend, & Vote for Other Businesses
       </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
      </div>      
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          Basic Profile
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          Photo Gallery
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          Social Media Accounts Linking 
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          Happy Customer Recommendation
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          Business Listing
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white"><i class="glyphicon glyphicon-ok"></i></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center"><i class="glyphicon glyphicon-ok"></i></div>
      </div>
      
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          Free Marketing & Writing Content 
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white"><i class="glyphicon glyphicon-ok"></i></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center"><i class="glyphicon glyphicon-ok"></i></div>
      </div>
      
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          <strong>Video Embedding</strong>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white"><i class="glyphicon glyphicon-remove"></i></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center"><i class="glyphicon glyphicon-ok"></i></div>
      </div>
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          <strong>Unlimited photos in Gallery</strong>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white">
          <i class="glyphicon glyphicon-remove"></i>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center">
          <i class="glyphicon glyphicon-ok"></i>
        </div>
      </div>
       <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          <strong>Sales & Events Promotion</strong>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white"><i class="glyphicon glyphicon-remove"></i></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center"><i class="glyphicon glyphicon-ok"></i></div>
      </div>
      
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          <strong>Additional Profile Section</strong>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white"><i class="glyphicon glyphicon-remove"></i></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center"><i class="glyphicon glyphicon-ok"></i></div>
      </div>
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          <strong>Customizable Web Name/URL</strong>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white"><i class="glyphicon glyphicon-remove"></i></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center"><i class="glyphicon glyphicon-ok"></i></div>
      </div>
      <div class="row border-none">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
          <strong>Profile Optimization</strong> 
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 blue lighten-2 text-center text-white"><i class="glyphicon glyphicon-remove"></i></div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 amber lighten-1 text-center"><i class="glyphicon glyphicon-ok"></i></div>
      </div>

      
    </div>
   <div class="table-fotter sign-custom-f">
      <div class="row">        
        <div class="signup-radio-button">
          <?php print drupal_render($form['plan']); ?>
        </div>
      </div>
    </div>
		
    <div class="signup-bottom-bar">
    <h2 class="st-title hidden-xs">Step 2: Choose Your Additional Services</h2>
    <h2 class="st-title visible-xs">Choose Your Additional Services</h2>
    <div class="row">
       <?php  print drupal_render($form['package']); ?>
    </div><?php  print drupal_render($form['submit']); ?>	</div>		
  </div>  
  
  <div style="display: none;">
   <?php print drupal_render_children($form); ?>
  </div> 
</div>



