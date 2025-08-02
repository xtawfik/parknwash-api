<?php

namespace App\Containers\AccPurchaseInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccPurchaseInvoiceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpurchaseinvoice = Apiato::call('AccPurchaseInvoice@CreateAccPurchaseInvoiceTask', [$data]);

        return $accpurchaseinvoice;
    }
}
