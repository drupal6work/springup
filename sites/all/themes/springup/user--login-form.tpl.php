<div class="login-page-logo"><img src="<?php print base_path(). path_to_theme() ?>/images/logo-secondary.png" /></div>
<div class="login-wrapper">
<div class="login-head">
	<h3>Log In</h3>
	<div class="login-head-signup">New User? <a href="<?php print base_path() ?>sign-up">Sign up</a></div>
</div>
<?php print drupal_render($form['name']); ?>

<?php print drupal_render($form['pass']); ?>

<?php print drupal_render($form['remember_me']); ?>

<?php print drupal_render($form['actions']); ?>

<?php print drupal_render($form['hybridauth']); ?>

<?php print drupal_render_children($form); ?>
</div>