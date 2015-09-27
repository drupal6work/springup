<div class="contactus-page"><div class="container">
<div class="login-head">
	<h2>Contact Us. We love to hear from you.</h2>
</div>
<div class="login-wrapper">
<?php print drupal_render($form['name']); ?>
<?php print drupal_render($form['mail']); ?>
<?php print drupal_render($form['subject']); ?>
<?php print drupal_render($form['cid']); ?>
<?php print drupal_render($form['message']); ?>

<?php print drupal_render_children($form); ?>
</div>
<div class="contact-block-page">
<div class="login-page-logo"><img src="<?php print base_path(). path_to_theme() ?>/images/logo-secondary.png" /></div>
<h3>Get in touch</h3>
<p>You can also contact us at:</p>
<div class="list-view">
<ul class="list-view-inner">
<li><i class="fa fa-mobile"></i>1300 25 20 35</li>
<li><i class="fa fa-map-marker"></i>PO Box 3033 QLD 4118</li>
<li><a href="mailto:connect@springup.com.au"><i class="fa fa-envelope-o"></i>connect@springup.com.au</a></li>
<li><a href="http://www.facebook.com/SpringUpAU"><i class="fa fa-facebook-official"></i></a><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a><a href="http://www.plus.google.com"><i class="fa fa-google-plus"></i></a></li>
</ul>
</div>
</div></div></div>
