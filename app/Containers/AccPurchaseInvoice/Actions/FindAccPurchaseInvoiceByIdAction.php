<?php

namespace App\Containers\AccPurchaseInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPurchaseInvoiceByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpurchaseinvoice = Apiato::call('AccPurchaseInvoice@FindAccPurchaseInvoiceByIdTask', [$request->id]);

        return $accpurchaseinvoice;
    }
}
