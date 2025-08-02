<?php

namespace App\Containers\DeductionType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDeductionTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('DeductionType@DeleteDeductionTypeTask', [$request->id]);
    }
}
