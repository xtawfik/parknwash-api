<?php

namespace App\Containers\AssetCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAssetCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $assetcategory = Apiato::call('AssetCategory@CreateAssetCategoryTask', [$data]);

        return $assetcategory;
    }
}
