<?php

namespace App\Containers\Account\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccountsAction extends Action
{
    public function run(Request $request)
    {
        $accounts = Apiato::call('Account@GetAllAccountsTask', [], ['addRequestCriteria']);

        return $accounts;
    }
}
