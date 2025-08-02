<?php

namespace App\Containers\AccAssetEntryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccAssetEntryItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accassetentryitem = Apiato::call('AccAssetEntryItem@UpdateAccAssetEntryItemTask', [$request->id, $data]);

        return $accassetentryitem;
    }
}
