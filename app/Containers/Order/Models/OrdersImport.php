<?php

namespace App\Containers\Order\Models;

use App\Containers\User\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class OrdersImport implements OnEachRow {

  public function onRow( Row $row ) {
    // index
    $rowIndex = $row->getIndex();
    $row = $row->toArray();

    // skip first row
    if ( $rowIndex == 1 ) {
      return;
    }

    $user = User::firstOrCreate([
      'name' => $row[0],
    ]);

    $orderData                     = [];
    $orderData['user_id']          = $user->id;
    $orderData['mall_id']          = $row[1];
    $orderData['service_id']       = $this->getServiceId($row[2] );
    $orderData['car_number']       = $row[3];
    $orderData['discount_percent'] = $row[4];
    $orderData['total']            = $row[5] == "FREE" ? 0 : $row[5];
    $orderData['date']             = Carbon::createFromFormat('Y-m-d',  $row[6] )->toDateTimeString();
    $orderData['client_phone']     = $row[7];
    $orderData['park_id']          = $row[8];
    $orderData['country_id']       = 1;
    $orderData['payment_method']   = 'cash';
    $orderData['is_client']        = 0;
    // created at and updated at
    $orderData['created_at'] = $orderData['date'];
    $orderData['updated_at'] = $orderData['date'];

    Order::create( $orderData );
  }

  private function getServiceId( $id ): int {
    switch ( $id ) {
      case 2:
      case "FREE" :
        return 3;
      case 3:
        return 42;
      case 4:
        return 8;
      case 9:
        return 52;
    }

    return 3;
  }
}
