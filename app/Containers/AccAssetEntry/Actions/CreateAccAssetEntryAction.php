<?php

namespace App\Containers\AccAssetEntry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccAssetEntryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accassetentry = Apiato::call('AccAssetEntry@CreateAccAssetEntryTask', [$data]);

        return $accassetentry;
    }
}
