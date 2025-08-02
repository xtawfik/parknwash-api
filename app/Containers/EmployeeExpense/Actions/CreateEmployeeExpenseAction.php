<?php

namespace App\Containers\EmployeeExpense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateEmployeeExpenseAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $employeeexpense = Apiato::call('EmployeeExpense@CreateEmployeeExpenseTask', [$data]);

        return $employeeexpense;
    }
}
