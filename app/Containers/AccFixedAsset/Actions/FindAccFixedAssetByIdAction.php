<?php

namespace App\Containers\AccFixedAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccFixedAssetByIdAction extends Action
{
    public function run(Request $request)
    {
        $accfixedasset = Apiato::call('AccFixedAsset@FindAccFixedAssetByIdTask', [$request->id]);

        return $accfixedasset;
    }
}
