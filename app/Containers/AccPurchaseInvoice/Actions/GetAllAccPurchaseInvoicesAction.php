<?php

namespace App\Containers\AccPurchaseInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPurchaseInvoicesAction extends Action
{
    public function run(Request $request)
    {
        $accpurchaseinvoices = Apiato::call('AccPurchaseInvoice@GetAllAccPurchaseInvoicesTask', [], ['addRequestCriteria']);

        return $accpurchaseinvoices;
    }
}
