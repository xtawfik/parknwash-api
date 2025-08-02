<?php

namespace App\Containers\AccSalesQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccSalesQuoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accsalesquote = Apiato::call('AccSalesQuote@CreateAccSalesQuoteTask', [$data]);

        return $accsalesquote;
    }
}
