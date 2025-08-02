<?php

namespace App\Containers\AccSalesQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccSalesQuoteByIdAction extends Action
{
    public function run(Request $request)
    {
        $accsalesquote = Apiato::call('AccSalesQuote@FindAccSalesQuoteByIdTask', [$request->id]);

        return $accsalesquote;
    }
}
