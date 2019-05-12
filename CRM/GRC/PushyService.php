<?php

use GuzzleHttp\Client;

class CRM_GRC_PushyService {

  const BASE_URI = 'https://api.pushy.me';

  /**
   * @param $data
   */
  private function notifyHandset($data) {
    $message = [
      'to' => Civi::settings()->get('grassrootscaller_token'),
      'time_to_live' => 20,
      'data' => $data,
    ];
    $client = new Client(['base_uri' => self::BASE_URI]);
    $client->post('push', [
      'query' => [
        'api_key' => Civi::settings()
          ->get('grassrootscaller_api_key'),
      ],
      'body' => json_encode($message),
      'headers' => ['Content-Type' => 'application/json'],
    ]);
  }

  /**
   * @param $contact_id
   *
   * @throws \CiviCRM_API3_Exception
   */
  public function call($contact_id) {

    $phone = civicrm_api3('Phone', 'getvalue', [
      'contact_id' => $contact_id,
      'is_primary' => 1,
      'return' => 'phone_numeric',
    ]);
    $data = [
      'action' => 'call',
      'phone' => $phone,
    ];
    $this->notifyHandset($data);
  }

  /**
   * @param $contact_id
   * @param $message
   *
   * @throws \CiviCRM_API3_Exception
   */
  public function sms($contact_id,$message) {

    $phone = civicrm_api3('Phone', 'getvalue', [
      'contact_id' => $contact_id,
      'is_primary' => 1,
      'return' => 'phone_numeric',
    ]);
    $data = [
      'action' => 'sms',
      'phone' => $phone,
      'message' => $message,
    ];
    $this->notifyHandset($data);
  }

}