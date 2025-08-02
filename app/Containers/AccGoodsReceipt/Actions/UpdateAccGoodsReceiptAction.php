<?php

namespace App\Containers\AccGoodsReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccGoodsReceiptAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accgoodsreceipt = Apiato::call('AccGoodsReceipt@UpdateAccGoodsReceiptTask', [$request->id, $data]);

        return $accgoodsreceipt;
    }
}
