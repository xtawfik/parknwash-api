<?php

namespace App\Containers\DeductionType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDeductionTypesAction extends Action
{
    public function run(Request $request)
    {
        $deductiontypes = Apiato::call('DeductionType@GetAllDeductionTypesTask', [], ['addRequestCriteria']);

        return $deductiontypes;
    }
}
