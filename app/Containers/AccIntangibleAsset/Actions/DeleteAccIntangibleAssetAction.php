<?php

namespace App\Containers\AccIntangibleAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccIntangibleAssetAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccIntangibleAsset@DeleteAccIntangibleAssetTask', [$request->id]);
    }
}
