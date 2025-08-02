<?php

namespace App\Containers\AccSalesQuote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccSalesQuoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accsalesquote = Apiato::call('AccSalesQuote@UpdateAccSalesQuoteTask', [$request->id, $data]);

        return $accsalesquote;
    }
}
