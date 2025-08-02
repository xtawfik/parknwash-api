<?php

namespace App\Containers\AccPurchaseOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccPurchaseOrderAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpurchaseorder = Apiato::call('AccPurchaseOrder@UpdateAccPurchaseOrderTask', [$request->id, $data]);

        return $accpurchaseorder;
    }
}
