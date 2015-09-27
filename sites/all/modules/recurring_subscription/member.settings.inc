<?php

/*
 * Implements member_cancel_setting_form().
 */
function member_cancel_setting_form($form, &$form_state) {
    $form['cancel_to'] = array(
		'#type' => 'textfield',
		'#title' => t('To'),
		'#default_value' => variable_get('cancel_to', ''),
		'#required' => true
    );	
	$form['cancel_subject'] = array(
        '#type' => 'textfield',
        '#title' => t('Subject'),
        '#default_value' => variable_get('cancel_subject', ''),
		'#required' => true
    );
	$form['cancel_reason'] = array(
        '#type' => 'textarea',
        '#title' => t('Reasons'),
        '#default_value' => variable_get('cancel_reason', ''),
		'#description' => t('Please enter each reasons each line.'),
		'#required' => true
    );
    $form['cancel_template'] = array(
        '#type' => 'textarea',
        '#title' => t('Message Template'),
        '#default_value' => variable_get('cancel_template', ''),
        '#description' => t('Tokens available : [cancel-subject], [cancel-reason], [user-name], [user-email], [cancel-body]'),
		'#required' => true
    );
    return system_settings_form($form);
}