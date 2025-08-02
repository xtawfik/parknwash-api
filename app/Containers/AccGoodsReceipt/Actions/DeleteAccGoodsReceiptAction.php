<?php

namespace App\Containers\AccGoodsReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccGoodsReceiptAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccGoodsReceipt@DeleteAccGoodsReceiptTask', [$request->id]);
    }
}
