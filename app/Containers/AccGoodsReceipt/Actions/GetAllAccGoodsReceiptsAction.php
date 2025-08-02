<?php

namespace App\Containers\AccGoodsReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccGoodsReceiptsAction extends Action
{
    public function run(Request $request)
    {
        $accgoodsreceipts = Apiato::call('AccGoodsReceipt@GetAllAccGoodsReceiptsTask', [], ['addRequestCriteria']);

        return $accgoodsreceipts;
    }
}
