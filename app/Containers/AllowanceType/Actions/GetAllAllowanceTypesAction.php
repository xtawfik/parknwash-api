<?php

namespace App\Containers\AllowanceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAllowanceTypesAction extends Action
{
    public function run(Request $request)
    {
        $allowancetypes = Apiato::call('AllowanceType@GetAllAllowanceTypesTask', [], ['addRequestCriteria']);

        return $allowancetypes;
    }
}
