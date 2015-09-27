<div class="login-page-logo"><img src="<?php print base_path(). path_to_theme() ?>/images/logo-secondary.png" /></div>
<div class="login-wrapper">
<div class="login-head">
	<h3>Password Setup</h3>	
</div>
<?php print drupal_render($form['message']); ?>
<?php print drupal_render_children($form); ?>
</div>