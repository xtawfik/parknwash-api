<?php

return [

  'provider' => env('SMS_PROVIDER', 'HiSMS'),
  'username' => env('SMS_USERNAME'),
  'password' => env('SMS_PASSWORD'),
  'sender' => env('SMS_SENDER'),
  'service_id' => env('SMS_SERVICE_ID'),
  'account_sid' => env('SMS_ACCOUNT_SID'),
  'auth_token' => env('SMS_AUTH_TOKEN'),

];

