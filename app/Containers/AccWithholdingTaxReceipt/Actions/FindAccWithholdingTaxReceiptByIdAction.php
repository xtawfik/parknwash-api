<?php

namespace App\Containers\AccWithholdingTaxReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccWithholdingTaxReceiptByIdAction extends Action
{
    public function run(Request $request)
    {
        $accwithholdingtaxreceipt = Apiato::call('AccWithholdingTaxReceipt@FindAccWithholdingTaxReceiptByIdTask', [$request->id]);

        return $accwithholdingtaxreceipt;
    }
}
