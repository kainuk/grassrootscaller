<?php

require_once 'grassrootscaller.civix.php';
use CRM_GRC_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function grassrootscaller_civicrm_config(&$config) {
  _grassrootscaller_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function grassrootscaller_civicrm_xmlMenu(&$files) {
  _grassrootscaller_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function grassrootscaller_civicrm_install() {
  _grassrootscaller_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function grassrootscaller_civicrm_postInstall() {
  _grassrootscaller_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function grassrootscaller_civicrm_uninstall() {
  _grassrootscaller_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function grassrootscaller_civicrm_enable() {
  _grassrootscaller_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function grassrootscaller_civicrm_disable() {
  _grassrootscaller_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function grassrootscaller_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _grassrootscaller_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function grassrootscaller_civicrm_managed(&$entities) {
  _grassrootscaller_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function grassrootscaller_civicrm_caseTypes(&$caseTypes) {
  _grassrootscaller_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function grassrootscaller_civicrm_angularModules(&$angularModules) {
  _grassrootscaller_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function grassrootscaller_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _grassrootscaller_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function grassrootscaller_civicrm_entityTypes(&$entityTypes) {
  _grassrootscaller_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function grassrootscaller_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 */
function grassrootscaller_civicrm_navigationMenu(&$menu) {
  _grassrootscaller_civix_insert_navigation_menu($menu, 'Administer/Communications', [
    'label' => E::ts('Grassroots Caller'),
    'name' => 'grassroots_caller_settings',
    'url' => 'civicrm/admin/setting/grassrootscaller',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ]);
}

/**
 * Implements hook_civicrm_summaryActions().
 *
 * @param $actions
 * @param $contactID
 */
function grassrootscaller_civicrm_summaryActions(&$actions, $contactID) {
  $actions['grc-sms'] = [
    'title' => ts('GRC Send SMS'),
    'weight' => 0,
    'ref' => 'grc-sms',
    'key' => 'grc-sms',
    'class' => 'small-popup',
    'href' => CRM_Utils_System::url('civicrm/grassrootscaller/sendsms?'),
  ];
  $actions['grc-call'] = [
    'title' => ts('GRC Call Phone'),
    'weight' => 1,
    'ref' => 'grc-call-phone',
    'key' => 'grc-call',
    'class' => 'small-popup',
    'href' => CRM_Utils_System::url('civicrm/grassrootscaller/callphone?'),
  ];
}
