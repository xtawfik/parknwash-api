<?php

namespace App\Containers\AccWithholdingTaxReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccWithholdingTaxReceiptAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccWithholdingTaxReceipt@DeleteAccWithholdingTaxReceiptTask', [$request->id]);
    }
}
