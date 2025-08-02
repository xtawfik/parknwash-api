<?php

namespace App\Containers\AccPurchaseQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPurchaseQuoteAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPurchaseQuote@DeleteAccPurchaseQuoteTask', [$request->id]);
    }
}
