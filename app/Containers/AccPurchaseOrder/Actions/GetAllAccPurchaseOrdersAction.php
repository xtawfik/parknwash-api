<?php

namespace App\Containers\AccPurchaseOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPurchaseOrdersAction extends Action
{
    public function run(Request $request)
    {
        $accpurchaseorders = Apiato::call('AccPurchaseOrder@GetAllAccPurchaseOrdersTask', [], ['addRequestCriteria']);

        return $accpurchaseorders;
    }
}
