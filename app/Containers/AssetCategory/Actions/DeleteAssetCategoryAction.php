<?php

namespace App\Containers\AssetCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAssetCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AssetCategory@DeleteAssetCategoryTask', [$request->id]);
    }
}
