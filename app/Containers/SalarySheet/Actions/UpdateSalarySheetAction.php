<?php

namespace App\Containers\SalarySheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSalarySheetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $salarysheet = Apiato::call('SalarySheet@UpdateSalarySheetTask', [$request->id, $data]);

        return $salarysheet;
    }
}
