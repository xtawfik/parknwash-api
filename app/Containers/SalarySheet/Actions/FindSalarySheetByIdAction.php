<?php

namespace App\Containers\SalarySheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSalarySheetByIdAction extends Action
{
    public function run(Request $request)
    {
        $salarysheet = Apiato::call('SalarySheet@FindSalarySheetByIdTask', [$request->id]);

        return $salarysheet;
    }
}
