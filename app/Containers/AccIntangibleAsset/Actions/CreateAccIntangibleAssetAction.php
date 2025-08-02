<?php

namespace App\Containers\AccIntangibleAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccIntangibleAssetAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accintangibleasset = Apiato::call('AccIntangibleAsset@CreateAccIntangibleAssetTask', [$data]);

        return $accintangibleasset;
    }
}
