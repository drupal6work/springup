<style>#first-time { display: none;}</style>
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



<!--homeSlider start-->
<?php print render($page['banner']); ?>
<!--homeSlider start-->
<!--Content starts here-->
<!-- Section #1 -->
<?php print render($page['block_one']); ?>
<!-- Section #2 -->
<?php print render($page['block_two']); ?>
<!-- Section #3 -->
<?php print render($page['block_three']); ?>
<?php print render($page['content']); ?>
<?php print render($page['footer']); ?>
<!--Content end here-->