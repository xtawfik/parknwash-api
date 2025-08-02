<?php

namespace App\Containers\AccIntangibleAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccIntangibleAssetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accintangibleasset = Apiato::call('AccIntangibleAsset@UpdateAccIntangibleAssetTask', [$request->id, $data]);

        return $accintangibleasset;
    }
}
