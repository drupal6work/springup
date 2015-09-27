<?php

/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
 module_load_include('inc', 'addressfield', 'addressfield.administrative_areas');
 $administrative_areas = addressfield_get_administrative_areas('AU');
 global $user;
?>
<?php foreach ($rows as $row_count => $row): ?>
<?php $u = user_load($row['user']);?>
<?php $status = FALSE; ?>
<?php if(!empty($u->field_publish_profile['und'][0]['value'])) { ?>
<?php $status = TRUE; ?>
<?php } ?>
<!--user content-->
<?php if($user->uid != $row['user']) { ?>
<section class="user-detail margin-bottom">
  <div class="container">
    <div class="row grey lighten-1">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 user-left">
        <?php print render($row['field_user_avatar']); ?>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 user-right">
        <div class="user-right-top">
          <h2><?php print render($row['field_user_name']); ?></h2>
          <span class="">
            <em>
              <?php if(empty($row['field_role_occupation'])) { ?>
                <?php echo 'Not Available,'; ?>
              <?php }else{ ?>
                <?php print render($row['field_role_occupation']); ?>, 
              <?php } ?>
              
              <?php if(empty($row['field_business_name'])) { ?>
                <?php echo 'Not Available'; ?>
              <?php }else{ ?>
                <?php print render($row['field_business_name']); ?> 
              <?php } ?>
              
              <?php //print render($row['field_my_address_thoroughfare']); ?>
              <?php print ' - ' . render($row['field_my_address_locality']) ;?>,
              <?php print $administrative_areas[$row['field_my_address_administrative_area']]; ?>
              <?php //print render($row['field_my_address_country']) ;?>			  
            </em>
          </span>
          <p></p>
          <?php print render($row['field_summery']); ?>
          <div class="user-right-bottom">
            <div class="row">              
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
                <?php
                //if(user_is_logged_in()) { 
                  $url = drupal_get_path_alias('user/'.$row['user']);
                //} else {
                //  $url = url('user/login');
                //}
                ?>
                <a href="<?php print $url; ?>" class="btn btn-info contact">View Profile</a>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--user content end-->
<?php } ?>
<?php endforeach; ?>