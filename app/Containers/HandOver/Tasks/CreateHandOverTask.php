<?php

namespace App\Containers\HandOver\Tasks;

use App\Containers\HandOver\Data\Repositories\HandOverRepository;
use App\Containers\HandOver\Models\HandOver;
use App\Containers\Mall\Models\Mall;
use App\Containers\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CreateHandOverTask extends Task {

  protected $repository;

  public function __construct( HandOverRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $check = HandOver::whereDate( 'created_at', Carbon::today() )->where( 'employee_id', Auth::id() )->first();
    if ( $check ) {
      return $check;
    }

    $user = Auth::user();
    $amount = Order::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->where('payment_method', 'cash')->sum('total');

    $country_id = $user->country->id;
    $mall_id = $user->mall_id;
    $employee_id = $user->id;

    $mall = Mall::find($mall_id);
    $supervisor_id = $mall->user_id;

    $data['country_id'] = $country_id;
    $data['mall_id'] = $mall_id;
    $data['employee_id'] = $employee_id;
    $data['amount'] = $amount;
    $data['status'] = 'requested';
    $data['supervisor_id'] = $supervisor_id;

    return $this->repository->create( $data );
  }
}

