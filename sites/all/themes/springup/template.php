<?php

/**
 * Override or insert variables into the maintenance page template.
 */
function springup_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // springup_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  springup_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */
function springup_preprocess_html(&$vars) {
  // Toggle fixed or fluid width.
  if (theme_get_setting('springup_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the html template.
 */
function springup_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

/**
 * Override or insert variables into the page template.
 */
function springup_preprocess_page(&$vars) {
  // Move secondary tabs into a separate variable.
  $vars['tabs2'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
  unset($vars['tabs']['#secondary']);

  if (isset($vars['main_menu'])) {
    $vars['primary_nav'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'main-menu'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['primary_nav'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_nav'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'secondary-menu'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_nav'] = FALSE;
  }

  // Prepare header.
  $site_fields = array();
  if (!empty($vars['site_name'])) {
    $site_fields[] = $vars['site_name'];
  }
  if (!empty($vars['site_slogan'])) {
    $site_fields[] = $vars['site_slogan'];
  }
  $vars['site_title'] = implode(' ', $site_fields);
  if (!empty($site_fields)) {
    $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
  }
  $vars['site_html'] = implode(' ', $site_fields);

  // Set a variable for the site name title and logo alt attributes text.
  $slogan_text = $vars['site_slogan'];
  $site_name_text = $vars['site_name'];
  $vars['site_name_and_slogan'] = $site_name_text . ' ' . $slogan_text;

  /* custom menus*/ 
  $vars['menu_links'] = '';
  $links  = '';
  $links .= l('General Settings', 'user/'. arg(1) .'/edit', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu'))) );
  $links .= l('Password Settings', 'profile/'. arg(1) .'/edit/password', array('query' => array('destination' => 'user') , 'attributes' => array('class' => array('form-menu')) ));
  $links .= l('Membership Status', 'user/'. arg(1) .'/member', array('query' => array('destination' => 'user') , 'attributes' => array('class' => array('form-menu')) ));
  $links .= l('Premium Services', 'user/'. arg(1) .'/member/upgrade', array('query' => array('destination' => 'user') , 'attributes' => array('class' => array('form-menu')) ));
  if(is_member()) {
    $uid = arg(1);
    if(is_numeric($uid)) {
      $account = user_load($uid);
      if(isset($account->data['membership']['order']['recurring']) && $account->data['membership']['order']['recurring'] > 0) {
        $links .= l('Cancel Membership', 'user/'. arg(1) .'/member/cancel', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu')) ));
      }
    }
  }
  if(( arg(2) == 'edit' && (arg(3) == '' || arg(3) == 'password' ) ) || arg(2) == 'member') {
    $vars['menu_links'] = $links;
  }
  
  $links  = '';
  $links .= l('Write Message', 'messages/new', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu'))) );
  $links .= l('Inbox', 'messages', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu'))) );
  $links .= l('Sent Messages', 'messages/sent', array('query' => array('destination' => 'user') , 'attributes' => array('class' => array('form-menu')) ));
  $links .= l('All Messages', 'messages/list', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu')) ));

  if(arg(0) == 'messages') {
     $vars['menu_links'] = $links;
  }
  $nid = arg(1);
  if(arg(0) == 'node' && is_numeric($nid)) {
    $node = node_load($nid);
    if($node->type == 'blog') {
      $vars['title'] = '';
    }
  }
}

/**
 * Override or insert variables into the node template.
 */
function springup_preprocess_node(&$vars) {
  $vars['submitted'] = $vars['date'] . ' — ' . $vars['name'];
}

/**
 * Override or insert variables into the comment template.
 */
function springup_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */
function springup_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['classes_array'][] = 'clearfix';
}

/**
 * Override or insert variables into the page template.
 */
function springup_process_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }

  if(arg(0) == 'user' && arg(2) == '') {
    $vars['theme_hook_suggestions'][] = 'page__user__profile'; 
  }
  
}

/**
 * Override or insert variables into the region template.
 */
function springup_preprocess_region(&$vars) {
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'clearfix';
  }
}

/*
 * Implements hook_theme().
 */
function springup_theme() {
  return array(    
    'create_account_form' => array(
      'render element' => 'form',
      'template' => 'create-account-form',
    ),
    'user_login' => array(
      'render element' => 'form',
      'template' => 'user--login-form',
    ),
    'user_pass'  => array(
      'render element' => 'form',
      'template' => 'user--pass-form',
    ),
    'contact_site_form' => array(
      'render element' => 'form',
      'template' => 'contact-site-form',
    ),
    'user_pass_reset' =>   array(
      'render element' => 'form',
      'template' => 'user-pass-reset',
    ), 
    'user_singup_form' => array(
      'render element' => 'form',
      'template' => 'user-singup-form',
    ),  
    'profile_about_me' => array(
      'render element' => 'elements',
      'template' => 'profile--about--me',
    ),
    'profile_offer' => array(
      'render element' => 'elements',
      'template' => 'profile--offer',
    ),
    'user_profile_comments' => array(
      'render element' => 'elements',
      'template' => 'user--profile--comments',
    ),    
  );    
}

function springup_preprocess_image_style(&$vars) {
  //if($vars['style_name'] == 'profile_image'){
    $vars['attributes']['class'][] = 'img-responsive';
  //}
  if($vars['style_name'] == 'about_image'){
    //$vars['attributes']['class'][] = 'img-responsive';
    $vars['attributes']['class'][] = 'margin-bottom';
  }
}

function springup_css_alter(&$css) {
  $exclude = array();
  foreach ($css as $key => $value) {
   $arr = explode('/', $key);
   $modules = reset($arr);
   if($modules == 'modules') {
     $exclude[$key] = FALSE;
   }
   if(in_array('addressfield', $arr) || in_array('privatemsg_filter', $arr)) {
     $exclude[$key] = FALSE;
   }
  }
  $css = array_diff_key($css, $exclude);
}
/*
function springup_preprocess_user_profile(&$variables) {
    global $user;
    $account = $variables['elements']['#account'];

    foreach (element_children($variables['elements']) as $key) {
      $variables['user_profile'][$key] = $variables['elements'][$key];
      
      if (isset($variables['user_profile'][$key]['view']) 
              && isset($variables['user_profile'][$key]['view']['profile2'])) {
        $profile_keys = array_keys($variables['user_profile'][$key]['view']['profile2']);
        $pid = reset($profile_keys);
        if (is_member() && $key != 'profile_about_us') {
          if (isset($variables['user_profile'][$key]['view']['profile2'][$pid]['field_block_position']['#items'][0]['value'])) {
            $weight = $variables['user_profile'][$key]['view']['profile2'][$pid]['field_block_position']['#items'][0]['value'];
            if (isset($weight) && $weight != '') {
              $variables['user_profile'][$key]['#weight'] = $weight;              
            }
          }
        }
        if (empty($variables['user_profile'][$key]['view']['profile2'][$pid]['field_public_status']['#items'][0]['value']) 
                && $account->uid != $user->uid && $key != 'profile_about_us') {
          unset($variables['user_profile'][$key]);
        }
      }
      
      if($key == 'profile_about_me' || $key == 'profile_offer') {
        if(isset($variables['user_profile'][$key]['view']['field_block_position']['#items'][0]['value'])) {
          $weight = $variables['user_profile'][$key]['view']['field_block_position']['#items'][0]['value'];
          if (isset($weight) && $weight != '') {
            $variables['user_profile'][$key]['#weight'] = $weight;              
          }
        }
        if(isset($variables['user_profile'][$key]['view']['field_public_status']['#items'][0]['value'])) {
          $status = $variables['user_profile'][$key]['view']['field_public_status']['#items'][0]['value'];
          if(empty($status) && $account->uid != $user->uid ) {
            unset($variables['user_profile'][$key]);
          }        
        }
      }
    }
  }
 */