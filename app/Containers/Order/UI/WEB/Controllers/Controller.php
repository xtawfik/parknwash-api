<?php

namespace App\Containers\Order\UI\WEB\Controllers;

use App\Containers\Order\Models\Order;
use App\Containers\User\Models\User;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Support\Facades\App;

/**
 * Class Controller
 *
 * @author  Mohamed Tawfik <contact@mohamedtawfik.me>
 */
class Controller extends WebController {

  public function getInvoice( $id ) {
    $order = Order::find($id);

    $client = $order->client;
    $employee = $order->employee;

    $employee_image = null;
      if($employee) {
        $medias = $employee->getMedia( "image" );
        if ( $medias ) {
          $url = [];
          foreach ($medias as $media) {
            $mediaUrl = $media->getUrl();

            if ( strpos( $mediaUrl, "http" ) === false ) {
              $mediaUrl = "https://{$media->getUrl()}";
            }

            $url[] = str_replace("/app/", "/", $mediaUrl);
          }

          if(count($url) === 1) {
            $url = $url[0];
          }

          $employee_image = $url;
      }
    } 

    return view('order::invoice', compact('order', 'client', 'id', 'employee', 'employee_image'));
  }
}
