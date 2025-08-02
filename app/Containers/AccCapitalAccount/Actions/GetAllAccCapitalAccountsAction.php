<?php

namespace App\Containers\AccCapitalAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCapitalAccountsAction extends Action
{
    public function run(Request $request)
    {
        $acccapitalaccounts = Apiato::call('AccCapitalAccount@GetAllAccCapitalAccountsTask', [], ['addRequestCriteria']);

        return $acccapitalaccounts;
    }
}
