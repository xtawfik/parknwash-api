<?php

namespace App\Containers\EmployeeExpense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindEmployeeExpenseByIdAction extends Action
{
    public function run(Request $request)
    {
        $employeeexpense = Apiato::call('EmployeeExpense@FindEmployeeExpenseByIdTask', [$request->id]);

        return $employeeexpense;
    }
}
