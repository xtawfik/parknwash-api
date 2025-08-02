<?php

namespace App\Containers\ServiceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllServiceTypesAction extends Action
{
    public function run(Request $request)
    {
        $servicetypes = Apiato::call('ServiceType@GetAllServiceTypesTask', [], ['addRequestCriteria']);

        return $servicetypes;
    }
}
