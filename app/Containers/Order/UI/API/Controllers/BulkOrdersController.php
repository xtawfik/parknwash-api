<?php

namespace App\Containers\Order\UI\API\Controllers;

use App\Containers\Employee\Models\Employee;
use App\Containers\Order\Models\Order;
use App\Containers\Order\UI\API\Transformers\OrderTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BulkOrdersController extends ApiController
{

  public function check(Request $request)
  {

    $employee = Employee::find($request->employee_id);
    $user_id = $employee->user_id;

    $staff = Auth::user();

    if (!$user_id) {
      throw new CreateResourceFailedException('Employee not found or not assigned to a user.');
    }

    $date = $request->created_at;
    $job_card_no = $request->job_card_no;
    $mall_id = $request->mall_id;
    $park_id = $request->park_id;
    $recorded_orders = $request->recorded_orders;

    if($recorded_orders > 20) {
      throw new CreateResourceFailedException('Recorded orders should not exceed 20.');
    }

    // Search orders by created_at and user_id
    $orders = Order::whereDate('created_at', $date)->where('user_id', '=', $user_id)->get();

    // Make time to be 6:00 PM
    $date = Carbon::parse($date)->setTime(18, 0, 0);

    // Check if orders less that recorded orders count create new orders
    if ($orders->count() < $recorded_orders) {
      for ($i = 0; $i < $recorded_orders - $orders->count(); $i++) {
        Order::create([
          'job_card_no' => $job_card_no,
          'created_at' => $date->format('Y-m-d H:i:s'),
          'mall_id' => $mall_id,
          'park_id' => $park_id,
          'user_id' => $user_id,
          'status' => 'completed',
          'staff_id' => $staff->id
        ]);
      }

      // Refetch orders
      $orders = Order::whereDate('created_at', $date)->where('user_id', '=', $user_id)->get();
    }

    return $this->transform($orders,OrderTransformer::class);
  }
}
