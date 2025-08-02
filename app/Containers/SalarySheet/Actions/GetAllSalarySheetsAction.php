<?php

namespace App\Containers\SalarySheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSalarySheetsAction extends Action
{
    public function run(Request $request)
    {
        $salarysheets = Apiato::call('SalarySheet@GetAllSalarySheetsTask', [], ['addRequestCriteria']);

        return $salarysheets;
    }
}
