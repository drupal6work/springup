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

?>
<div class="smallCrousel" id="FeaturedProfiles">
  <div class="container">
    <div class="col-md-12">
      <div class="row">
        <h1 class="sprinUp-title">See our Featured <span class="text-blue text-uppercase">profiles</span></h1>
        <div class="owl-carousel" id="owl-demo">
        <?php foreach ($rows as $row_count => $row): ?>
         <?php
          $role = 'Not Available';
          $name = 'Not Available';
          if(!empty($row['field_role_occupation'])) {
             $role = $row['field_role_occupation'];
           }
           if(!empty($row['field_business_name'])) {
             $name = $row['field_business_name'];
           }   
        ?>
          <div class="item">
            <a href="<?php print base_path() . drupal_get_path_alias('user/'.$row['user']); ?>">
              <?php print $row['field_user_avatar'] ?>
            </a>
            <h4 class="otherPeople-title text-center"><?php print $row['field_user_name'] ?></h4>
            <p class="text-center">            
              <?php print $role . ', ' . $name; ?>
            </p> 
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>