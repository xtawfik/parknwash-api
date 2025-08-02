<?php

namespace App\Containers\FixedAssets\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateFixedAssetsAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $fixedassets = Apiato::call('FixedAssets@UpdateFixedAssetsTask', [$request->id, $data]);

        return $fixedassets;
    }
}
