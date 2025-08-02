<?php

namespace App\Containers\SalarySheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateSalarySheetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $salarysheet = Apiato::call('SalarySheet@CreateSalarySheetTask', [$data]);

        return $salarysheet;
    }
}
