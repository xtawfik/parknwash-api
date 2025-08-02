<?php

namespace App\Containers\JobCard\Tasks;

use App\Containers\Employee\Models\Employee;
use App\Containers\JobCard\Data\Repositories\JobCardRepository;
use App\Containers\Order\Models\Order;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateJobCardTask extends Task
{

  protected $repository;

  public function __construct(JobCardRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run(array $data)
  {

    $repository = null;

    $from_date = $data['from_date'];
    $to_date = $data['to_date'];

    // Extract dates from the given range
    $dates = [];
    $current = strtotime($from_date);
    $last = strtotime($to_date);

    while( $current <= $last ) {
      $dates[] = date('Y-m-d', $current);
      $current = strtotime('+1 day', $current);
    }

    // Get all active employees
    $employees = Employee::where('work_status', "working")->get();

    // Generate job cards for each date
    foreach( $dates as $date ) {
      $data['date'] = $date;

      // Loop through employees
      foreach( $employees as $employee ) {
        $data['employee_id'] = $employee->id;

        // Get orders for the given date
        $orders = Order::whereDate('created_at', $date)->where('user_id', $employee->user_id);

        if($orders->count() == 0) {
          continue;
        }

        $firstOrder = $orders->first();

        // Count orders with service->service_type_id = 4
        $excluded = clone $orders;
        $excluded = $excluded->whereHas('service', function ($query) {
          $query->where('service_type_id', 4);
        })->count();

        $total_money = $orders->sum( 'total' );
        $total_cars = $orders->count();

        $data['total_money'] = $total_money;
        $data['total_cars'] = $total_cars;

        $total_cars -= $excluded;

        if( $firstOrder ) {
          $data['mall_id'] = $firstOrder->mall_id;

          if( $firstOrder->park) {
            $data['park_id'] = $firstOrder->park_id;
          }
        }

        $data['mat_covers'] = $total_cars * 4;
        $data['seat_covers'] = $total_cars * 2;
        $data['steering_covers'] = $total_cars * 1;
        $data['gear_covers'] = $total_cars * 1;
        $data['hand_covers'] = $total_cars * 2;
        $data['garbage_bags'] = $total_cars * 1;
        $data['tissue_boxes'] = $total_cars * 1;
        $data['water_bottles'] = $total_cars * 1;
        $data['air_fresheners'] = $total_cars * 1;

        // Check if job card already exists
        $repository = $this->repository->findWhere([
          'employee_id' => $employee->id,
          'date' => $date
        ])->first();

        if($repository) {
          $repository = $this->repository->update($data, $repository->id);
        } else {
          $repository = $this->repository->create($data);
        }

      }
    }

    if(!$repository) {
      throw new CreateResourceFailedException();
    }

    return $repository;
  }
}

