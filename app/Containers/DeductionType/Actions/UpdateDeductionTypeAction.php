<?php

namespace App\Containers\DeductionType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateDeductionTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $deductiontype = Apiato::call('DeductionType@UpdateDeductionTypeTask', [$request->id, $data]);

        return $deductiontype;
    }
}
