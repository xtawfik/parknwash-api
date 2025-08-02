<?php

namespace App\Containers\AccControlType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccControlTypesAction extends Action
{
    public function run(Request $request)
    {
        $acccontroltypes = Apiato::call('AccControlType@GetAllAccControlTypesTask', [], ['addRequestCriteria']);

        return $acccontroltypes;
    }
}
