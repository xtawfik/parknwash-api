<?php

namespace App\Containers\AccBankStatement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccBankStatementsAction extends Action
{
    public function run(Request $request)
    {
        $accbankstatements = Apiato::call('AccBankStatement@GetAllAccBankStatementsTask', [], ['addRequestCriteria']);

        return $accbankstatements;
    }
}
