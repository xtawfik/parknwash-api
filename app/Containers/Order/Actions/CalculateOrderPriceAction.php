<?php

namespace App\Containers\Order\Actions;

use App\Containers\Service\Models\Service;
use App\Containers\UserCar\Models\UserCar;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Str;

class CalculateOrderPriceAction extends Action
{
  public function run()
  {
    $car = UserCar::find(request('car_id'));
    $service_type = 5;
    $car_id = null;
    switch ($car->car_type) {
      case "sedan":
        $car_id = 3;
        break;
      case "suv":
        $car_id = 2;
        break;
      case "bike":
        $car_id = 9;
        break;
    }

    $wash_type = request('wash_type');
    if($wash_type == "external") {
      $service_type = 4;
    } else if($wash_type == "internal") {
      $service_type = 3;
    }

    // vip && vvip
    if ($addon = request('add_on')) {
      if ($addon == "vip") {
        $car_id = 4;
      } else if ($addon == "vvip") {
        $car_id = 5;
      }

      $service_type = 5;
    }

    $service = Service::where('car_id', $car_id)->where('service_type_id', $service_type)->first();
    $price = $service->price;
    $service_id = $service->id;

    $service_price = 5;
    if($car->car_type == "bike") {
      $service_price = 4;
    }

    $addons_price = $price - $service_price;

    $price_data = [
      "service" => Str::upper($car->car_type),
      "service_price" => number_format($service_price, 2),
      "addons_price" => number_format($addons_price, 2),
      "subtotal" => number_format($price, 2),
      "total" => number_format($price, 2),
      "plain_total" => $price,
    ];

    return [
      "price_data" => $price_data,
      "total" => $price,
      "service_id" => $service_id,
      "car_number" => $car->plate_number . " - " . $car->plate_code,
      "car_model_id" => $car->car_model_id,
    ];
  }
}
