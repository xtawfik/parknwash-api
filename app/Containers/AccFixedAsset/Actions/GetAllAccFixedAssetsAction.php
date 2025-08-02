<?php

namespace App\Containers\AccFixedAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccFixedAssetsAction extends Action
{
    public function run(Request $request)
    {
        $accfixedassets = Apiato::call('AccFixedAsset@GetAllAccFixedAssetsTask', [], ['addRequestCriteria']);

        return $accfixedassets;
    }
}
