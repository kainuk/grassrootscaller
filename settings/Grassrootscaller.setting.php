<?php

return [
  'grassrootscaller_api_key' => [
    'group_name' => 'Grassroots Caller Preferences',
    'group' => 'grassrootscaller',
    'name' => 'grassrootscaller_api_key',
    'html_type' => 'text',
    'html_attributes' => ['size' => '60'],
    'type' => 'string',
    'title' => 'Api Key',
    'add' => '5.8',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'API Key for the notification application',
    'help_text' => 'In the first step the notifications are done by pushy.me',
    'settings_pages' => ['grassrootscaller' => ['weight' => 10]]
  ],
  'grassrootscaller_token' => [
    'group_name' => 'Token',
    'group' => 'grassrootscaller',
    'name' => 'grassrootscaller_token',
    'html_type' => 'text',
    'html_attributes' => ['size' => '20'],
    'type' => 'string',
    'title' => 'Token',
    'add' => '5.8',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'Token of the phone that must be called',
    'help_text' => 'Token used to identify the phone',
    'settings_pages' => ['grassrootscaller' => ['weight' => 15]]
  ],
];
