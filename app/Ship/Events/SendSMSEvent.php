<?php

namespace App\Ship\Events;

use App\Ship\Parents\Events\Event;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSMSEvent extends Event implements ShouldQueue {


  protected $message;
  protected $mobile;

  /**
   * SendSMSEvent constructor.
   *
   * @param $message
   * @param $mobile
   */
  public function __construct( $message, $mobile ) {
    $this->message = $message;
    $this->mobile  = $mobile;
  }

  /**
   * Handle the Event. (Single Listener Implementation)
   */
  public function handle() {
    $message = $this->message;
    $mobile  = $this->mobile;

    $client = new Client();

    $provider = config('sms.provider');

    /**
     * HiSMS Provider API
     */
    if($provider == "HiSMS") {
      $client->get( 'https://www.hisms.ws/api.php', [
        'query' => [
          'send_sms' => '1',
          'username' => config('sms.username'),
          'password' => config('sms.password'),
          'sender'   => config('sms.sender'),
          'numbers'  => $mobile,
          'message'  => $message
        ]
      ] );
    }

    /**
     * Twilio Provider API
     * Send verify code to user
     */
    if($provider == "Twilio") {
      $client->post( 'https://verify.twilio.com/v2/Services/' . config('sms.service_id') . '/Verifications', [
        'form_params' => [
          'To'      => $mobile,
          'Channel' => 'sms',
          'CustomCode' => $message
        ],
        'auth' => [
          config('sms.account_sid'),
          config('sms.auth_token')
        ]
      ] );
    }

    /**
     * KWT SMS Provider API
     */
    if($provider == "KWT") {
      // Clean mobile number - remove + and ensure it starts with country code
      $cleanMobile = preg_replace('/[^0-9]/', '', $mobile);
      
      $client->post( 'https://www.kwtsms.com/API/send/', [
        'form_params' => [
          'username' => config('sms.username'),
          'password' => config('sms.password'),
          'sender'   => config('sms.sender'),
          'mobile'   => $cleanMobile,
          'lang'     => config('sms.lang', '1'),
          'test'     => config('sms.test_mode', '0'),
          'message'  => $message
        ],
        'headers' => [
          'Content-Type' => 'application/x-www-form-urlencoded'
        ]
      ] );
    }




  }
}
