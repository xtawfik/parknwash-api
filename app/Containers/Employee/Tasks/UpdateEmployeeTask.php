<?php

namespace App\Containers\Employee\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Employee\Data\Repositories\EmployeeRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateEmployeeTask extends Task
{

  protected $repository;

  public function __construct(EmployeeRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run($id, array $data)
  {
    // if updating contract_start_date set contract_end_date after 3 years
    if (isset($data['contract_start_date'])) {
      $data['contract_end_date'] = date('Y-m-d', strtotime('+3 years', strtotime($data['contract_start_date'])));
    }

    // check if updating mall_id update user's mall_id
    if (isset($data['mall_id'])) {
      $employee = $this->repository->find($id);
      $user = User::where('id', $employee->user_id)->first();

      if ($user) {
        $user->mall_id = $data['mall_id'];
        $user->save();
      }else{
        $user = User::create([
          'name' => $employee->name_en,
          'email' => $employee->email,
          'password' => bcrypt('1234'),
          'mall_id' => $data['mall_id'],
        ]);

        $data['user_id'] = $user->id;
      }
    }

    // Unset mall_id from data
    unset($data['mall_id']);

    return $this->repository->update($data, $id);
  }
}

