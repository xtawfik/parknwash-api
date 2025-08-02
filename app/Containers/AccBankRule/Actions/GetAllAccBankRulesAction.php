<?php

namespace App\Containers\AccBankRule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccBankRulesAction extends Action
{
    public function run(Request $request)
    {
        $accbankrules = Apiato::call('AccBankRule@GetAllAccBankRulesTask', [], ['addRequestCriteria']);

        return $accbankrules;
    }
}
