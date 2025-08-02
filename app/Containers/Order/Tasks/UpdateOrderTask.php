<?php

namespace App\Containers\Order\Tasks;

use App\Containers\Employee\Models\Employee;
use App\Containers\Order\Data\Repositories\OrderRepository;
use App\Containers\UserCar\Models\UserCar;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateOrderTask extends Task
{

  protected $repository;

  public function __construct(OrderRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run($id, array $data)
  {

    if(isset($data['inlineEdit'])) {
      if(isset($data['employee_id'])) {
        // Get user_id from employee_id
        $employee = Employee::find($data['employee_id']);
        if($employee) {
          $data['user_id'] = $employee->user_id;
        }
      }

      // Check phone number if more than 8 digits ignore it
      if(isset($data['client_phone']) && strlen($data['client_phone']) > 8) {
        unset($data['client_phone']);
      }

      // Check if data has car_number 
      if(isset($data['car_number'])) {
        $car = UserCar::where('plate_number', $data['car_number'])->first();
        if($car) {
          $data['car_id'] = $car->id;
          $data['car_model_id'] = $car->car_model_id;
          $data['client_phone'] = $car->user->phone;
          $data['client_name'] = $car->user->name;
        }
      }
    }


    return $this->repository->update($data, $id);
  }
}

