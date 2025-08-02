<?php

namespace App\Containers\AccWithholdingTaxReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccWithholdingTaxReceiptAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accwithholdingtaxreceipt = Apiato::call('AccWithholdingTaxReceipt@CreateAccWithholdingTaxReceiptTask', [$data]);

        return $accwithholdingtaxreceipt;
    }
}
