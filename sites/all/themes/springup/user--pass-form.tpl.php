<div class="login-page-logo"><img src="<?php print base_path(). path_to_theme() ?>/images/logo-secondary.png" /></div>
<div class="login-wrapper">
<div class="login-head">
	<h3>Request new password</h3>
</div>
<div><p>To reset your password, enter the email address you use to sign in to SpringUp.</p></div>
<?php print drupal_render($form['name']); ?>
<?php print drupal_render_children($form); ?>
</div>