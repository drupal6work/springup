<div class="container"><div class="blog-full"><div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <div class="date-format"><?php print 'Posted on ' . date('jS F Y', $node->created) .' in ' . render($content['field_blog_category']); ?></div>
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php 
    	print '<div class="blog-share-box">';
      $facebook = $content['facebookshare'];      
    	print render($content['easy_social_1']);
    	print render($content['facebookshare']); 
    	hide($content['easy_social_2']); 
    	print '</div>';
      hide($content['comments']);
      hide($content['links']);
      print '<div class="blog-content">';
      print render($content);
      print '</div>';
      print '<div class="blog-share-box">';
      print render($content['easy_social_2']);
      print render($facebook);
      print '</div>';
    ?>
  </div>
  
    <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <?php //hide($content['links']['blog']) ?>
      <div class="links"><?php print render($content['links']['node']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
  
</div></div></div>
