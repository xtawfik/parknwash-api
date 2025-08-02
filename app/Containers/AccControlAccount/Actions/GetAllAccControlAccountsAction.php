<?php

namespace App\Containers\AccControlAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccControlAccountsAction extends Action
{
    public function run(Request $request)
    {
        $acccontrolaccounts = Apiato::call('AccControlAccount@GetAllAccControlAccountsTask', [], ['addRequestCriteria']);

        return $acccontrolaccounts;
    }
}
