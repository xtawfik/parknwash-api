<?php

namespace App\Containers\Expense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateExpenseAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $expense = Apiato::call('Expense@UpdateExpenseTask', [$request->id, $data]);

        return $expense;
    }
}
