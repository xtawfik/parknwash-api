<?php

namespace App\Containers\AccPurchaseQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccPurchaseQuoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpurchasequote = Apiato::call('AccPurchaseQuote@CreateAccPurchaseQuoteTask', [$data]);

        return $accpurchasequote;
    }
}
