<?php

namespace App\Containers\AccPurchaseQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPurchaseQuoteByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpurchasequote = Apiato::call('AccPurchaseQuote@FindAccPurchaseQuoteByIdTask', [$request->id]);

        return $accpurchasequote;
    }
}
