<?php

namespace App\Containers\AccFixedAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccFixedAssetAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccFixedAsset@DeleteAccFixedAssetTask', [$request->id]);
    }
}
