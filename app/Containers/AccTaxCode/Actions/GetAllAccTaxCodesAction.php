<?php

namespace App\Containers\AccTaxCode\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccTaxCodesAction extends Action
{
    public function run(Request $request)
    {
        $acctaxcodes = Apiato::call('AccTaxCode@GetAllAccTaxCodesTask', [], ['addRequestCriteria']);

        return $acctaxcodes;
    }
}
