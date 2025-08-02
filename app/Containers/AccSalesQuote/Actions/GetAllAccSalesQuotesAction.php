<?php

namespace App\Containers\AccSalesQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccSalesQuotesAction extends Action
{
    public function run(Request $request)
    {
        $accsalesquotes = Apiato::call('AccSalesQuote@GetAllAccSalesQuotesTask', [], ['addRequestCriteria']);

        return $accsalesquotes;
    }
}
