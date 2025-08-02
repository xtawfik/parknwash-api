<?php

namespace App\Containers\AccAssetEntryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccAssetEntryItemByIdAction extends Action
{
    public function run(Request $request)
    {
        $accassetentryitem = Apiato::call('AccAssetEntryItem@FindAccAssetEntryItemByIdTask', [$request->id]);

        return $accassetentryitem;
    }
}
