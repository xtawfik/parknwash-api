<?php

namespace App\Containers\AccIntangibleAsset\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccIntangibleAssetsAction extends Action
{
    public function run(Request $request)
    {
        $accintangibleassets = Apiato::call('AccIntangibleAsset@GetAllAccIntangibleAssetsTask', [], ['addRequestCriteria']);

        return $accintangibleassets;
    }
}
