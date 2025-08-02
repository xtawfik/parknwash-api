<?php

namespace App\Containers\AssetCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAssetCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $assetcategory = Apiato::call('AssetCategory@UpdateAssetCategoryTask', [$request->id, $data]);

        return $assetcategory;
    }
}
