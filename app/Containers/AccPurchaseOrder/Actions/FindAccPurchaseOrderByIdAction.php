<?php

namespace App\Containers\AccPurchaseOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPurchaseOrderByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpurchaseorder = Apiato::call('AccPurchaseOrder@FindAccPurchaseOrderByIdTask', [$request->id]);

        return $accpurchaseorder;
    }
}
