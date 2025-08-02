<?php

namespace App\Containers\EmployeeExpense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllEmployeeExpensesAction extends Action
{
    public function run(Request $request)
    {
        $employeeexpenses = Apiato::call('EmployeeExpense@GetAllEmployeeExpensesTask', [], ['addRequestCriteria']);

        return $employeeexpenses;
    }
}
