<?php
use CRM_GRC_ExtensionUtil as E;

/**
 * GRCaller.Call API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 */
function _civicrm_api3_g_r_caller_Call_spec(&$spec) {
  $spec['contact_id'] = [
    'api.required'=> 1,
    'type' =>  CRM_Utils_Type::T_INT,
    'description' => 'Contact to call',
    'title' => 'Contact',
    'FKClassName' => 'CRM_Contact_DAO_Contact',
    'FKApiName' => 'Contact',
    ];
  $spec['phone_type_id'] = [
    'type' =>  CRM_Utils_Type::T_INT,
    'description' => 'What phone do you want to calll',
    'title' => 'Phone Type',
    'html' =>  [
      'type' => 'Select',
      'size' =>  6],
    'options' => CRM_Core_BAO_Phone::buildOptions('phone_type_id'),
  ];
}

/**
 * GRCaller.Call API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_g_r_caller_Call($params) {
  $returnValues = [];
  $service = new CRM_GRC_PushyService();
  try {
    $service->call($params['contact_id']);
    return civicrm_api3_create_success($returnValues, $params, 'GRCaller', 'call');
  } catch (Exception $ex) {
    return civicrm_api3_create_error($ex->getMessage());
  }
}
