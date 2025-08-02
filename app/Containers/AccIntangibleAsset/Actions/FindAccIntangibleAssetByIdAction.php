<?php

namespace App\Containers\AccIntangibleAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccIntangibleAssetByIdAction extends Action
{
    public function run(Request $request)
    {
        $accintangibleasset = Apiato::call('AccIntangibleAsset@FindAccIntangibleAssetByIdTask', [$request->id]);

        return $accintangibleasset;
    }
}
