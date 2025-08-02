<?php

namespace App\Containers\EmployeeExpense\Tasks;

use App\Containers\EmployeeExpense\Data\Repositories\EmployeeExpenseRepository;
use App\Containers\GeneralOption\Models\GeneralOption;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateEmployeeExpenseTask extends Task
{

  protected $repository;

  public function __construct(EmployeeExpenseRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run($id, array $data)
  {

    if(isset($data['name'])) {
      $name_option = GeneralOption::find($data['name']);
      $data['name_en'] = $name_option->name_en;
      $data['name_ar'] = $name_option->name_ar;

      unset($data['name']);
    }

    $repository = $this->repository->update($data, $id);

    #ManyToMany#

    return $repository;
  }
}

