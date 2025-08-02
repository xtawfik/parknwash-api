<?php

namespace App\Containers\AccWithholdingTaxReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccWithholdingTaxReceiptAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accwithholdingtaxreceipt = Apiato::call('AccWithholdingTaxReceipt@UpdateAccWithholdingTaxReceiptTask', [$request->id, $data]);

        return $accwithholdingtaxreceipt;
    }
}
