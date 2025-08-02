<?php

namespace App\Containers\DeductionType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDeductionTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $deductiontype = Apiato::call('DeductionType@FindDeductionTypeByIdTask', [$request->id]);

        return $deductiontype;
    }
}
