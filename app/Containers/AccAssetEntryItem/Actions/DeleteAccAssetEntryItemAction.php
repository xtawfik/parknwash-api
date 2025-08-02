<?php

namespace App\Containers\AccAssetEntryItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccAssetEntryItemAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccAssetEntryItem@DeleteAccAssetEntryItemTask', [$request->id]);
    }
}
