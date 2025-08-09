<?php

return [

  'provider' => env('SMS_PROVIDER', 'KWT'),
  'username' => env('SMS_USERNAME'),
  'password' => env('SMS_PASSWORD'),
  'sender' => env('SMS_SENDER'),
  
  // KWT SMS specific settings
  'lang' => env('SMS_LANG', '1'),
  'test_mode' => env('SMS_TEST_MODE', '0'),
  
  // Legacy Twilio settings (kept for backward compatibility)
  'service_id' => env('SMS_SERVICE_ID'),
  'account_sid' => env('SMS_ACCOUNT_SID'),
  'auth_token' => env('SMS_AUTH_TOKEN'),

];

