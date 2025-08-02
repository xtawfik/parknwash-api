<?php

namespace App\Containers\AccSalesQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccSalesQuoteAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccSalesQuote@DeleteAccSalesQuoteTask', [$request->id]);
    }
}
