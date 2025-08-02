<?php

namespace App\Containers\AccFixedAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccFixedAssetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accfixedasset = Apiato::call('AccFixedAsset@UpdateAccFixedAssetTask', [$request->id, $data]);

        return $accfixedasset;
    }
}
