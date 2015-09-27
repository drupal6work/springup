<?php

  function member_manage_view($account) {
    drupal_set_title('Membership Status');
    $data = array();
    $profile_id = '';
    $plans = _subscription_plan();
		$msgg = '';
    if(!empty($account->data['membership']['order']['plan_id'])) {
      $tid = $account->data['membership']['order']['plan_id'];
    }else {
      $msgg = 'Payment Due';
    }

    if (!empty($account->data['membership']['nvp_response']['PROFILEID'])) {
      $profile_id = $account->data['membership']['nvp_response']['PROFILEID'];
    }
    if (!empty($profile_id)) {
      $profile_data = recurring_subscription_payflow_profile($profile_id);
      if (isset($profile_data['RESULT']) && $profile_data['RESULT'] == 0) {
        $data[] = array('data' => 'Status : ' . $profile_data['STATUS']);
        $data[] = array('data' => 'Start : ' . substr($profile_data['START'], 2, 2) . '/' . substr($profile_data['START'], 0, 2) . '/' . substr($profile_data['START'], 4, 4));
        $data[] = array('data' => 'Next Payment : ' . substr($profile_data['NEXTPAYMENT'], 2, 2) . '/' . substr($profile_data['NEXTPAYMENT'], 0, 2) . '/' . substr($profile_data['NEXTPAYMENT'], 4, 4));
        $data[] = array('data' => 'Amount : $' . $profile_data['AMT']);
        $data[] = array('data' => 'Acct : ' . 'XXXX'. substr($profile_data['ACCT'],4));
        $data[] = array('data' => 'Card Expiry Date : ' . substr($profile_data['EXPDATE'], 0, 2) . '/20' . substr($profile_data['EXPDATE'], 2, 2));
		
		$ex_date = substr($profile_data['START'], 0, 2) . '/' . substr($profile_data['START'], 2, 2) . '/' . substr($profile_data['START'], 4, 4);
		$user_exp = date('d/m/Y',strtotime($ex_date . "+1 days"));		
		$data[] = array('data' => 'Membership Expiry Date : ' . $user_exp);		
      }
    }
    $pkg = array();
    if (!empty($account->data['membership']['order']['package'])) {
      $package = _package_plan();
      foreach ($account->data['membership']['order']['package'] as $key => $val) {
        if (isset($package[$val['tid']])) {
          $pkg[] = array('data' => $package[$val['tid']]);
        }
      }
    }
    $build = '';
    if (empty($data)) {
      $data[] = array('data' => 'Free Member');
    }
    
    $history = array(
        '#type' => 'user_profile_item',
        '#title' => !empty($tid) ? t($plans[$tid]) : $msgg,
        '#markup' => theme('item_list', array('items' => $data)),
        '#attributes' => array('class' => array('')),
    );
    $build = render($history);

    if (!empty($pkg)) {
      $addon = array(
          '#type' => 'user_profile_item',
          '#title' => t('Addon Package'),
          '#markup' => theme('item_list', array('items' => $pkg)),
          '#attributes' => array('class' => array('')),
      );
      $build .= render($addon);
    }
    
    return '<div id="member-view">' . $build . '</div>';
  }

  function member_manage_cancel($account) {
    drupal_set_title('Cancel Membership');
    global $user;
    $profile_id = '';
    if (!empty($account->data['membership']['nvp_response']['PROFILEID'])) {
      $profile_id = $account->data['membership']['nvp_response']['PROFILEID'];
      if ($profile_id) {
        if (in_array('administrator', $user->roles)) {
		  $form_id = 'admin_member_cancel_form';
		  $form = drupal_get_form($form_id, $account, $profile_id);
          $cancelForm = drupal_render($form);
        } else {
		  $form_id = 'member_cancel_form';
		  $form = drupal_get_form($form_id, $account);
          $cancelForm = drupal_render($form);
        }
      }
      return $cancelForm;
    } else {
      return "No plan is available to cancel";
    }
  }

  /**
   * Implements hook_form().
   */
  function upgrade_member_form($form, $form_state, $account) {
    drupal_set_title('Premium Services');
    
    if (isset($account->data['membership']['order']['recurring']) &&
            $account->data['membership']['order']['recurring'] == 0) {

      $plans = _subscription_plan();
      $tid = $account->data['membership']['order']['plan_id'];

      // Remove current plan option
      if (isset($plans[$tid])) {
        unset($plans[$tid]);
      }
      if (!empty($plans)) {
        $form['plan'] = array(
            '#title' => t('Select Plan'),
            '#type' => 'radios',
            '#options' => $plans,
            '#required' => FALSE,
        );
      }
    } elseif(!isset($account->data['membership'])) {
      $plans = _subscription_plan();
      if (isset($plans[2])) {
        unset($plans[2]);
      }
      if (!empty($plans)) {
        $form['plan'] = array(
            '#title' => t('Select Plan'),
            '#type' => 'radios',
            '#options' => $plans,
            '#required' => FALSE,
        );
      }
    }
    $package = _package_plan();

    // Remove current addon plan option
    if (!empty($account->data['membership']['order']['package'])) {
      $pkg = $account->data['membership']['order']['package'];
      foreach ($pkg as $key => $val) {
        if (isset($package[$val['tid']])) {
          unset($package[$val['tid']]);
        }
      }
    } 

    
    $form['package'] = array(
        '#title' => t('Additional Package'),
        '#type' => 'checkboxes',
        '#options' => $package,
        '#required' => FALSE,
    );
    $form['method'] = array(
        '#type' => 'hidden',
        '#value' => 'addon'
    );
    $form['atype'] = array(
        '#type' => 'hidden',
        '#value' => 'upgrade'
    );
    $form['mail'] = array(
        '#type' => 'hidden',
        '#value' => $account->mail
    );
    $form['uid'] = array(
        '#type' => 'hidden',
        '#value' => $account->uid
    );
	$form['error_redirect'] = array(
        '#type' => 'hidden',
        '#value' => $_GET['q']
    );	
    $form += drupal_retrieve_form('credit_card_form', $form_state);
    $form['#validate'][] = 'upgrade_member_form_validate';
    $form['#validate'][] = 'credit_card_form_validate';
    $form['#submit'][] = 'upgrade_member_form_submit';
    $form['#submit'][] = 'credit_card_form_submit';
    
    /*
    $links  = '<div class="margin-bottom hidden-xs">';
    $links .= l('Account Settings', 'user/'.$account->uid.'/edit', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu'))) );
    $links .= l('Membership Plan', 'user/'.$account->uid.'/member', array('query' => array('destination' => 'user') , 'attributes' => array('class' => array('form-menu')) ));
    $links .= l('Upgrade Plan', 'user/'.$account->uid.'/member/upgrade', array('query' => array('destination' => 'user') , 'attributes' => array('class' => array('form-menu')) ));

    if(is_member()) {
      $links .= l('Cancel Membership', 'user/'.$account->uid.'/member/cancel', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu')) ));
    }
    $links .= '</div>';
    $form['links'] = array(
      '#markup' => $links,
      '#weight' => -1000
    ); */
    return $form;
  }

  /**
   * Implements hook_form_validate().
   */
  function upgrade_member_form_validate($form, &$form_state) {
    if (empty($form_state['values']['package']) && empty($form_state['values']['plan'])) {
      form_set_error('', t('Please select atleast Plan OR Package.'));
    }
  }

  /**
   * Implements hook_form_submit().
   */
  function upgrade_member_form_submit($form, &$form_state) {
    $info = array(
        'sell_price' => 0, // Plan price + additional package price
        'duration' => '', // Recurring Duration
        'recurring' => 0, // Plan price
        'uid' => '',    // uid for account detail page
        'assign' => '', // Role assign when plan purchased 
        'revoke' => '', // Role assign when payment not credited
        'plan_id' => '', // Plan tid
        'package' => array(), // Additional package details
    );
    if (!empty($form_state['values']['plan'])) {
      $tid = $form_state['values']['plan'];
      $plan = _subscription_plan_details($tid);
      $info['sell_price'] = $plan['sell_price'];
      $info['duration'] = $plan['duration'];
      $info['recurring'] = $plan['sell_price'];
      $info['assign'] = $plan['assign'];
      $info['revoke'] = $plan['revoke'];
      $info['plan_id'] = $tid;
      if ($info['recurring'] > 0) {
        $form_state['values']['method'] = 'recurring';
      }
    }
    $packages = array();
    if (!empty($form_state['values']['package'])) {
      foreach ($form_state['values']['package'] as $key => $tid) {
        if ($tid > 0) {
          $plan = _subscription_plan_details($tid);
          $info['sell_price'] += $plan['sell_price'];
          $packages[] = array('tid' => $tid, 'sell_price' => $plan['sell_price'], 'assign' => $plan['assign']);
        }
      }
    }
    $info['uid'] = $form_state['values']['uid'];
    $info['package'] = $packages;

    $form_state['values']['order'] = serialize($info);
  }

  /**
   * Implements hook_form().
   */
  function admin_member_cancel_form($form, $form_state, $account, $profile_id) {
    $form['message'] = array('#markup' => "<p>Cancel membership and stop recurring payment.</p>");
    $form['profile_id'] = array(
        '#type' => 'hidden',
        '#value' => $profile_id
    );
    $form['uid'] = array(
        '#type' => 'hidden',
        '#value' => $account->uid
    );
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => 'Yes, I want to cancel'
    );
    return $form;
  }

  /**
   * Implements hook_form_submit().
   */
  function admin_member_cancel_form_submit($form, &$form_state) {
    if (!empty($form_state['values']['profile_id'])) {
      if (recurring_subscription_profile_cancel($form_state['values']['profile_id'])) {
        //$account = user_load($form_state['values']['uid']);
        //$account->data['membership']['order']['recurring'] = 0;			
        //user_save($account);
        drupal_set_message('Your membership is cancel successfully. It will effected from next billing cycle');
      }
    }
  }

  /**
   * Implements hook_form().
   */
  function member_cancel_form($form, &$form_state, $recipient) {
    global $user;
    // Check if flood control has been activated for sending e-mails.
    $limit = variable_get('contact_threshold_limit', 5);
    $window = variable_get('contact_threshold_window', 3600);
    if (!flood_is_allowed('contact', $limit, $window) && !user_access('administer contact forms') && !user_access('administer users')) {
      drupal_set_message(t("You cannot send more than %limit messages in @interval. Try again later.", array('%limit' => $limit, '@interval' => format_interval($window))), 'error');
      drupal_access_denied();
      drupal_exit();
    }

    /*
    $links  = '<div class="margin-bottom hidden-xs">';
      $links .= l('Account Settings', 'user/'.$user->uid.'/edit', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu'))) );
      $links .= l('Membership Plan', 'user/'.$user->uid.'/member', array('query' => array('destination' => 'user') , 'attributes' => array('class' => array('form-menu')) ));
      $links .= l('Upgrade Plan', 'user/'.$user->uid.'/member/upgrade', array('query' => array('destination' => 'user') , 'attributes' => array('class' => array('form-menu')) ));
      if(is_member()) {
        $links .= l('Cancel Membership', 'user/'.$user->uid.'/member/cancel', array('query' => array('destination' => 'user'), 'attributes' => array('class' => array('form-menu')) ));
      }
      $links .= '</div>';
      
      $form['links'] = array(
          '#markup' => $links,
          '#weight' => -1000
      );
    */
    $form['recipient'] = array(
        '#type' => 'value',
        '#value' => $recipient,
    );
    $form['name'] = array(
        '#type' => 'hidden',
        '#default_value' => $recipient->init,
    );

    $form['to'] = array(
        '#type' => 'hidden',
        '#default_value' => variable_get('cancel_to', ''),
    );

    $form['mail'] = array(
        '#type' => 'hidden',
        '#default_value' => $recipient->uid ? $recipient->mail : '',
    );

    $options = explode("\r\n", variable_get('cancel_reason', ''));

    $form['reason'] = array(
        '#type' => 'select',
        '#title' => t('Reason'),
        '#options' => $options,
        '#required' => TRUE,
    );

    $form['message'] = array(
        '#type' => 'textarea',
        '#title' => t('Message'),
        '#rows' => 15,
        '#required' => TRUE,
    );

    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Send request'),
    );
    return $form;
  }

  /**
   * Form submission handler for member_cancel_form().
   *
   * @see member_cancel_form_validate()
   */
  function member_cancel_form_submit($form, &$form_state) {
    global $user, $language;

    $values = $form_state['values'];
    $values['sender'] = $user;
    $values['sender']->name = $values['name'];
    $values['sender']->mail = $values['mail'];

    // Save the anonymous user information to a cookie for reuse.
    if (!$user->uid) {
      user_cookie_save(array_intersect_key($values, array_flip(array('name', 'mail'))));
    }

    // Get the to and from e-mail addresses.
    $to = $values['to'];
    $from = variable_get('site_mail', '');

    // Send the e-mail in the requested user language.
    $sent = drupal_mail('subscribers', 'cancel_subscription_mail', $to, user_preferred_language($values['recipient']), $values, $from);

    flood_register_event('contact', variable_get('contact_threshold_window', 3600));
    watchdog('mail', '%sender-name (@sender-from) sent %recipient-name an e-mail.', array('%sender-name' => $values['name'], '@sender-from' => $from, '%recipient-name' => $values['recipient']->name));

    // Jump to the contacted user's profile page.
    if (isset($sent['result']) && $sent['result'] == 1) {
      drupal_set_message(t('We have received your cancel subscription request, we will contact you soon.'));
    }
    $form_state['redirect'] = url(current_path(), array('absolute' => TRUE));
  }
  
