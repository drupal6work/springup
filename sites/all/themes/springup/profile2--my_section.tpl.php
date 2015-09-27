<!--About section-->
<section class="ui-state-default aboutMe margin-bottom" data-name="profile_my_section">
  <div class="container white">
    <h1 class="sprinUp-title prfile-title" style="cursor: crosshair;">
      <?php print render($content['field_section_heading'][0]); ?>
      <?php if (is_author(arg(1))) { ?>
          <span class="pull-right edit-link" style="font-size:14px;">
            <?php print l(t('Edit'), 'user/' . arg(1) . '/edit/my_section', array('query' => array('destination' => 'user'))); ?>

          </span>
        <?php } ?>
    </h1>
    <div class="row">
      <div class="col-xs-12 col-sm-3 col-md-3 pull-right">
        <?php print render($content['field_section_image'][0]); ?>  
      </div>
      <div class="col-xs-12 col-sm-9 col-md-9">
        <?php print render($content['field_section_description'][0]); ?>
      </div>
    </div>
  </div>
</section>
<!--about end-->
