<?php

namespace App\Containers\AccSpecialAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccSpecialAccountsAction extends Action
{
    public function run(Request $request)
    {
        $accspecialaccounts = Apiato::call('AccSpecialAccount@GetAllAccSpecialAccountsTask', [], ['addRequestCriteria']);

        return $accspecialaccounts;
    }
}
