<?php

namespace App\Containers\Order\UI\API\Controllers;

use App\Containers\Employee\Models\Employee;
use App\Containers\Order\Models\Order;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class JobCardsController extends ApiController
{
  public function check(Request $request)
  {
    // Find the employee and get the associated user ID
    $employee = Employee::find($request->employee_id);
    $user_id = $employee->user_id;

    if (!$user_id) {
      throw new CreateResourceFailedException('Employee not found or not assigned to a user.');
    }

    $month = $request->month;
    $year = $request->year;
    $job_card = $request->job_card_no;

    // Retrieve orders based on search criteria (user_id, month, year, job_card_no if provided)
    $ordersQuery = Order::where('user_id', $user_id);

    if ($month) {
      $ordersQuery->whereMonth('created_at', $month);
    }

    if ($year) {
      $ordersQuery->whereYear('created_at', $year);
    }

    if ($job_card) {
      $ordersQuery->where('job_card_no', $job_card);
    }

    $orders = $ordersQuery->get();

    // Group orders by job_card_no
    $groupedOrders = $orders->groupBy('job_card_no')->map(function (Collection $orders, $jobCardNo) use ($employee) {
      $firstOrder = $orders->first(); // Get the first order in this job card group

      return [
        'employee_code' => $employee->employee_code,
        'job_card_no' => $jobCardNo,
        'day' => $firstOrder->created_at->format('d'),
        'month' => $firstOrder->created_at->format('m'),
        'year' => $firstOrder->created_at->format('Y'),
        'orders_count' => $orders->count(),
        'total' => $orders->sum('total'),
        'credit' => $orders->where('payment_method', 'visa')->sum('total'),
        'cash' => $orders->where('payment_method', 'cash')->sum('total'),
        'wallet' => $orders->where('payment_method', 'wallet')->sum('total'),
        'free' => $orders->where('payment_method', 'free')->sum('total'),
        'subscription' => $orders->where('payment_method', 'subscription')->sum('total'),
        'debug_ids' => $orders->pluck('id')->toArray(),
      ];
    });

    return [
      'data' => $groupedOrders->values() // Use values() to reset the keys in the response
    ];
  }
}
