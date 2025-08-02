<?php

namespace App\Containers\Order\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Order\Data\Repositories\OrderRepository;
use App\Containers\User\Models\User;
use App\Containers\UserCar\Models\UserCar;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Auth;

class CreateOrderTask extends Task
{

  protected $repository;

  public function __construct(OrderRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run(array $data)
  {
    $mall_id = Auth::user()->mall_id;
    if ($mall_id) {
      $data['mall_id'] = $mall_id;
    }

    if(request('requestedBy') == "mobile") {

      $client = Auth::user();
      $data['is_client'] = 1;

      if(request("client_id")) {
        $client = User::find(request("client_id"));
        $data['is_client'] = 0;

        $user = Auth::user();
        $data['user_id'] = $user->id;
      }

      $data['client_id'] = $client->id;
      $data['client_name'] = $client->name;
      $data['client_phone'] = $client->phone;
      $data['status'] = "pending";
      $data['country_id'] = 1;

      $order_details = Apiato::call('Order@CalculateOrderPriceAction');

      $data['service_id'] = $order_details['service_id'];
      $data['total'] = $order_details['total'];

      $data['car_model_id'] = $order_details['car_model_id'];
      $data['car_number'] = $order_details['car_number'];

      $data['payment_method'] = request('payment_method');

      // deduct from wallet
      $client->balance = $client->balance - $order_details['total'];
      $client->save();
    }

    return $this->repository->create($data);
  }
}
