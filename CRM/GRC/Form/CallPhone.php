<?php

use CRM_GRC_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_GRC_Form_CallPhone extends CRM_Core_Form {

  var $_contactId = 0;
  var $_displayName = '';
  var $_phone = false;

  public function preProcess() {
    $this->_contactId = CRM_Utils_Request::retrieve('cid','Positive',$this);
    $this->_displayName = civicrm_api3('Contact','getvalue',[
      'id' => $this->_contactId,
      'return' => 'display_name',
    ]);

    $this->_phone = civicrm_api3('Contact','getvalue',[
      'contact_id' => $this->_contactId,
      'is_primary' => true,
      'return' => 'phone',
    ]);

    parent::preProcess();
  }

  public function buildQuickForm() {

    $this->assign('displayName',$this->_displayName);
    $this->assign('phone',$this->_phone);

    $this->addButtons([
        [ 'type' => 'submit',
          'name' => E::ts('Call'),
          'isDefault' => TRUE,
        ],
        [ 'type' => 'cancel',
          'name' => E::ts('Cancel'),
        ]]
    );
    parent::buildQuickForm();
  }

  public function postProcess() {
    civicrm_api3('GRCaller','call',[
      'contact_id' => $this->_contactId,
    ]);
    parent::postProcess();
  }

}
