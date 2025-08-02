<?php

namespace App\Containers\EmployeeExpense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteEmployeeExpenseAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('EmployeeExpense@DeleteEmployeeExpenseTask', [$request->id]);
    }
}
