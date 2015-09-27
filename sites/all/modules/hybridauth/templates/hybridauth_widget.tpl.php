<div class="hybridauth-widget-wrapper"><?php
  print theme('item_list',
    array(
      'items' => $providers,
      'title' => '<span>'.$element['#title'].'</span>',
      'type' => 'ul',
      'attributes' => array('class' => array('hybridauth-widget')),
    )
  );
?></div>