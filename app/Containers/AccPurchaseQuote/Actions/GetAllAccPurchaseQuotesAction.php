<?php

namespace App\Containers\AccPurchaseQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPurchaseQuotesAction extends Action
{
    public function run(Request $request)
    {
        $accpurchasequotes = Apiato::call('AccPurchaseQuote@GetAllAccPurchaseQuotesTask', [], ['addRequestCriteria']);

        return $accpurchasequotes;
    }
}
