<?php

namespace App\Containers\AccPurchaseOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPurchaseOrderAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPurchaseOrder@DeleteAccPurchaseOrderTask', [$request->id]);
    }
}
