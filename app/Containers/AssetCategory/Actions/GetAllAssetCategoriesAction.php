<?php

namespace App\Containers\AssetCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAssetCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $assetcategories = Apiato::call('AssetCategory@GetAllAssetCategoriesTask', [], ['addRequestCriteria']);

        return $assetcategories;
    }
}
