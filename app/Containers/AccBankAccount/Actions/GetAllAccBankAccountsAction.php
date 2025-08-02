<?php

namespace App\Containers\AccBankAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccBankAccountsAction extends Action
{
    public function run(Request $request)
    {
        $accbankaccounts = Apiato::call('AccBankAccount@GetAllAccBankAccountsTask', [], ['addRequestCriteria']);

        return $accbankaccounts;
    }
}
