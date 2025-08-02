<?php

namespace App\Containers\FixedAssets\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindFixedAssetsByIdAction extends Action
{
    public function run(Request $request)
    {
        $fixedassets = Apiato::call('FixedAssets@FindFixedAssetsByIdTask', [$request->id]);

        return $fixedassets;
    }
}
