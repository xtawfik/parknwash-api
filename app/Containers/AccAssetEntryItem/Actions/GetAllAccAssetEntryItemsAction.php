<?php

namespace App\Containers\AccAssetEntryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccAssetEntryItemsAction extends Action
{
    public function run(Request $request)
    {
        $accassetentryitems = Apiato::call('AccAssetEntryItem@GetAllAccAssetEntryItemsTask', [], ['addRequestCriteria']);

        return $accassetentryitems;
    }
}
