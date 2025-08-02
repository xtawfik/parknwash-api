<?php

namespace App\Containers\EmployeeExpense\Tasks;

use App\Containers\EmployeeExpense\Data\Repositories\EmployeeExpenseRepository;
use App\Containers\GeneralOption\Models\GeneralOption;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateEmployeeExpenseTask extends Task
{

  protected $repository;

  public function __construct(EmployeeExpenseRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run(array $data)
  {

    $name_option = GeneralOption::find($data['name']);
    $data['name_en'] = $name_option->name_en;
    $data['name_ar'] = $name_option->name_ar;

    unset($data['name']);

    $repository = $this->repository->create($data);

    #ManyToMany#

    return $repository;
  }
}

