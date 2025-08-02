<?php

namespace App\Containers\AssetCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAssetCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $assetcategory = Apiato::call('AssetCategory@FindAssetCategoryByIdTask', [$request->id]);

        return $assetcategory;
    }
}
