<?php

namespace App\Containers\Allowance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAllowancesAction extends Action
{
    public function run(Request $request)
    {
        $allowances = Apiato::call('Allowance@GetAllAllowancesTask', [], ['addRequestCriteria']);

        return $allowances;
    }
}
