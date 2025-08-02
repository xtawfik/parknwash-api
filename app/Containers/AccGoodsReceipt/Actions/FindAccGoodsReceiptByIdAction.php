<?php

namespace App\Containers\AccGoodsReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccGoodsReceiptByIdAction extends Action
{
    public function run(Request $request)
    {
        $accgoodsreceipt = Apiato::call('AccGoodsReceipt@FindAccGoodsReceiptByIdTask', [$request->id]);

        return $accgoodsreceipt;
    }
}
