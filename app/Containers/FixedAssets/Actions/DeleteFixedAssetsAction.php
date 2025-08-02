<?php

namespace App\Containers\FixedAssets\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteFixedAssetsAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('FixedAssets@DeleteFixedAssetsTask', [$request->id]);
    }
}
