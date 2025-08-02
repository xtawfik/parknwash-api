<?php

namespace App\Containers\AccCapitalSubAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCapitalSubAccountsAction extends Action
{
    public function run(Request $request)
    {
        $acccapitalsubaccounts = Apiato::call('AccCapitalSubAccount@GetAllAccCapitalSubAccountsTask', [], ['addRequestCriteria']);

        return $acccapitalsubaccounts;
    }
}
