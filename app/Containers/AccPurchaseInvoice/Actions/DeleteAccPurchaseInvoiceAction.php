<?php

namespace App\Containers\AccPurchaseInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPurchaseInvoiceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPurchaseInvoice@DeleteAccPurchaseInvoiceTask', [$request->id]);
    }
}
