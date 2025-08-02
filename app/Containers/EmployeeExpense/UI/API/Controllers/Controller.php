<?php

namespace App\Containers\EmployeeExpense\UI\API\Controllers;

use App\Containers\Employee\Models\Employee;
use App\Containers\EmployeeExpense\Models\EmployeeExpense;
use App\Containers\EmployeeExpense\UI\API\Requests\CreateEmployeeExpenseRequest;
use App\Containers\EmployeeExpense\UI\API\Requests\DeleteEmployeeExpenseRequest;
use App\Containers\EmployeeExpense\UI\API\Requests\GetAllEmployeeExpensesRequest;
use App\Containers\EmployeeExpense\UI\API\Requests\FindEmployeeExpenseByIdRequest;
use App\Containers\EmployeeExpense\UI\API\Requests\UpdateEmployeeExpenseRequest;
use App\Containers\EmployeeExpense\UI\API\Transformers\EmployeeExpenseTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\EmployeeExpense\UI\API\Controllers
 */
class Controller extends ApiController
{
  /**
   * @param CreateEmployeeExpenseRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function createEmployeeExpense(CreateEmployeeExpenseRequest $request)
  {
    $employeeexpense = Apiato::call('EmployeeExpense@CreateEmployeeExpenseAction', [$request]);

    $this->uploadMedia($employeeexpense, "image", true);
    $this->uploadMedia($employeeexpense, "gallery");
    $this->uploadMedia($employeeexpense, "file");

    return $this->created($this->transform($employeeexpense, EmployeeExpenseTransformer::class));
  }

  /**
   * @param FindEmployeeExpenseByIdRequest $request
   * @return array
   */
  public function findEmployeeExpenseById(FindEmployeeExpenseByIdRequest $request)
  {
    $employeeexpense = Apiato::call('EmployeeExpense@FindEmployeeExpenseByIdAction', [$request]);

    return $this->transform($employeeexpense, EmployeeExpenseTransformer::class);
  }

  /**
   * @param GetAllEmployeeExpensesRequest $request
   * @return array
   */
  public function getAllEmployeeExpenses(GetAllEmployeeExpensesRequest $request)
  {
    // Clone all expenses where employee_id=0 to all employees
//    $employees = Employee::all();
//    foreach ($employees as $employee) {
//      $expenses = EmployeeExpense::where('employee_id', 0)->get();
//      foreach ($expenses as $expense) {
//        $newExpense = $expense->replicate();
//        $newExpense->employee_id = $employee->id;
//        $newExpense->save();
//      }
//    }١

    if(request("action") == "add_year" and request("year")) {
      $backupExpenses = EmployeeExpense::where('employee_id', 0)->get();
      $employee_id = request("employee_id");
      $year = request("year");

      foreach ($backupExpenses as $backupExpense) {
        // Check if expense already exists (if date has year and same name_en)
        $expense = EmployeeExpense::where('employee_id', $employee_id)->where('name_en', $backupExpense->name_en)->whereYear('date', $year)->first();
        if(!$expense) {
          $newExpense = $backupExpense->replicate();
          $newExpense->employee_id = $employee_id;
          $newExpense->date = $year . "-" . date("m-d", strtotime($backupExpense->date));
          $newExpense->save();
        }
      }
    }

    $employeeexpenses = Apiato::call('EmployeeExpense@GetAllEmployeeExpensesAction', [$request]);

    return $this->transform($employeeexpenses, EmployeeExpenseTransformer::class);
  }

  /**
   * @param UpdateEmployeeExpenseRequest $request
   * @return array
   */
  public function updateEmployeeExpense(UpdateEmployeeExpenseRequest $request)
  {
    $employeeexpense = Apiato::call('EmployeeExpense@UpdateEmployeeExpenseAction', [$request]);

    $this->uploadMedia($employeeexpense, "image", true);
    $this->uploadMedia($employeeexpense, "gallery");
    $this->uploadMedia($employeeexpense, "file");

    return $this->transform($employeeexpense, EmployeeExpenseTransformer::class);
  }

  /**
   * @param DeleteEmployeeExpenseRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function deleteEmployeeExpense(DeleteEmployeeExpenseRequest $request)
  {
    Apiato::call('EmployeeExpense@DeleteEmployeeExpenseAction', [$request]);

    return $this->noContent();
  }
}
