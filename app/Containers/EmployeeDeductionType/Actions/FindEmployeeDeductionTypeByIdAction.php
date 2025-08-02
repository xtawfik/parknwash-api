<?php

namespace App\Containers\EmployeeDeductionType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindEmployeeDeductionTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $employeedeductiontype = Apiato::call('EmployeeDeductionType@FindEmployeeDeductionTypeByIdTask', [$request->id]);

        return $employeedeductiontype;
    }
}
