<?php

namespace App\Containers\AccWithholdingTaxReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccWithholdingTaxReceiptsAction extends Action
{
    public function run(Request $request)
    {
        $accwithholdingtaxreceipts = Apiato::call('AccWithholdingTaxReceipt@GetAllAccWithholdingTaxReceiptsTask', [], ['addRequestCriteria']);

        return $accwithholdingtaxreceipts;
    }
}
