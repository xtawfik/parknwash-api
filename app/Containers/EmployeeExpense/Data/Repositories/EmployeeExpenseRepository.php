<?php

namespace App\Containers\EmployeeExpense\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EmployeeExpenseRepository
 */
class EmployeeExpenseRepository extends Repository
{

  /**
   * @var array
   */
  protected $fieldSearchable = [
    'id' => '=',
    'name' => 'like',
    'amount' => 'like',
    'employee_id' => '=',

  ];

}
