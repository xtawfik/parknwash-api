<?php

namespace App\Containers\Order\UI\API\Controllers;

use App\Containers\Mall\Models\Mall;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Order\Models\Order;
use App\Containers\Order\UI\API\Transformers\OrderTransformer;
use App\Containers\User\Models\User;
use App\Containers\UserCar\Models\UserCar;
use App\Containers\UserCar\UI\API\Transformers\UserCarTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClientSearchController extends ApiController
{

  public function mall()
  {
    $user = Auth::user();
    $mall = Mall::where('id', '=', $user->mall_id)->first();
    return $this->transform($mall, MallTransformer::class);
  }

  public function search()
  {
    // Search clients by phone number
    $client = User::where('email', '=', request()->phone . '@parknwash.com')->first();

    if(!$client) {
      $client = User::create([
        'name' => 'Auto-generated Client',
        'phone' => request()->phone,
        'email' => request()->phone . '@parknwash.com',
        'password' => bcrypt(Str::random()),
        'is_client' => 1,
        'balance' => 0,
      ]);

      return [
        "data" => [
          "is_new_client" => true,
          "id" => $client->id,
          "name" => $client->name,
          "phone" => $client->phone,
          "cars" => [],
          "wallet_balance" => 0,
          "active_orders" => [],
        ]
      ];
    }

    // Get client cars and active orders
    $cars = UserCar::with('carModel')->where('user_id', '=', $client->id)->get();
    $active_orders = Order::where('client_id', '=', $client->id)->where('status', 'pending')->get();

    // Add transformer to return the client data
    $cars = $this->transform($cars, UserCarTransformer::class)['data'];
    $active_orders = $this->transform($active_orders, OrderTransformer::class)['data'];

    return [
      "data" => [
        "is_new_client" => false,
        "id" => $client->id,
        "name" => $client->name,
        "phone" => $client->phone,
        "cars" => $cars,
        "wallet_balance" => $client->balance,
        "active_orders" => $active_orders,
      ]
    ];
  }
}
