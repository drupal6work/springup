<div class="login-page-logo"><img src="<?php print base_path(). path_to_theme() ?>/images/logo-secondary.png" /></div>
<div class="login-wrapper">
  <?php if(!empty($form['display'])) { ?>
  <p>
    We value your privacy. This page is secured to protect your information.
    <img align="right" src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_secured_by_pp_2line.png" alt="PayPal" />
  </p>
  <?php } ?>
	<div class="login-head">
		<h3>Create new account</h3>
	</div>
    <div class="fieldset-wrapper">
      <div class="login-block">
        <?php
          print drupal_render($form['profile_about_us']['field_user_name']);
          print drupal_render($form['account']['mail']);
          print drupal_render($form['account']['mail_confirm']);
        ?>
      </div>
      <div class="social-block">
        <?php print drupal_render($form['hybridauth']); ?>
      </div>
    </div>  
  <?php print drupal_render($form['profile_about_us']['field_my_address']); ?>
  <?php if(!empty($form['display'])) { ?>
  <fieldset>
    <legend>Payment Details</legend>
    <div class="fieldset-wrapper">
      <div class="login-block">
        <img src="https://www.paypalobjects.com/webstatic/mktg/logo/PP_AcceptanceMarkTray-NoDiscover_243x40.png" />
   
        <?php    
          print drupal_render($form['cc_number']);
          print drupal_render($form['cc_exp_month']);
          print drupal_render($form['cc_exp_year']);
          print drupal_render($form['cc_cvv']);
        ?>
      </div>
    </div>
  </fieldset>
  <?php } ?>
 <?php print drupal_render($form['terms_of_use']); ?>
 <?php print drupal_render_children($form); ?>
 <?php print drupal_render($form['display']); ?>
</div>