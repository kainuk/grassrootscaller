<?php
use CRM_GRC_ExtensionUtil as E;

/**
 * GRCaller.Sms API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_g_r_caller_Sms_spec(&$spec) {
  $spec['contact_id'] = [
    'api.required'=> 1,
    'type' =>  CRM_Utils_Type::T_INT,
    'description' => 'Contact to send a sms',
    'title' => 'Contact',
    'FKClassName' => 'CRM_Contact_DAO_Contact',
    'FKApiName' => 'Contact',
  ];
  $spec['phone_type_id'] = [
    'type' =>  CRM_Utils_Type::T_INT,
    'description' => 'What phone do you want to send to',
    'title' => 'Phone Type',
    'html' =>  [
      'type' => 'Select',
      'size' =>  6],
    'options' => CRM_Core_BAO_Phone::buildOptions('phone_type_id'),
  ];
  $spec['message'] = [
    'api.required'=> 1,
    'type' =>  CRM_Utils_Type::T_STRING,
    'description' => 'Message to send',
    'title' => 'Message',
  ];
}

/**
 * GRCaller.Sms API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_g_r_caller_Sms($params) {
  $returnValues = [];
  $service = new CRM_GRC_PushyService();
  try {
    $service->sms($params['contact_id'],$params['message']);
    return civicrm_api3_create_success($returnValues, $params, 'GRCaller', 'sms');
  } catch (Exception $ex) {
    return civicrm_api3_create_error($ex->getMessage());
  }
}
