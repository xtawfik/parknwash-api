<?php

namespace App\Containers\SalarySheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSalarySheetAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('SalarySheet@DeleteSalarySheetTask', [$request->id]);
    }
}
