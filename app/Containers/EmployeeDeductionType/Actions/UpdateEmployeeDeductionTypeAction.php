<?php

namespace App\Containers\EmployeeDeductionType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateEmployeeDeductionTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $employeedeductiontype = Apiato::call('EmployeeDeductionType@UpdateEmployeeDeductionTypeTask', [$request->id, $data]);

        return $employeedeductiontype;
    }
}
