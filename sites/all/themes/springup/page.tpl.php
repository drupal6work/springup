<!--main navigation-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container main-navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>                    
      <a class="navbar-brand" href="<?php print $front_page ?>">
        <?php if ($logo): ?>
            <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
          <?php endif; ?>            
      </a>					
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php print render($page['search']); ?>
      <?php print render($page['header']); ?>
    </div>
  </div>
</nav>
<!--main navigation end-->
  <?php if( arg(1) != 109 ) {  ?>
    <?php print $messages; ?>
  <?php } ?>
<?php print render($page['content-top']); ?>
<div class="page-show-web">
  <?php if ($title): ?>
  <div class="main-title-page">
    <h1 class="title" id="page-title">
      <?php print $title; ?>
    </h1></div>
  <?php endif; ?>
  <?php if(!empty($menu_links)) { ?>
  <div class="margin-bottom tabs-wrapper">
    <?php print $menu_links; ?>
  </div>
  <?php } ?>
<?php print render($page['content-middle']); ?>
<?php print render($page['content']); ?>
<?php print render($page['content-bottom']); ?>
</div>
<?php print render($page['footer']); ?>
