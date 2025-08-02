<?php

namespace App\Containers\AccBalanceSheet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccBalanceSheetsAction extends Action
{
    public function run(Request $request)
    {
        $accbalancesheets = Apiato::call('AccBalanceSheet@GetAllAccBalanceSheetsTask', [], ['addRequestCriteria']);

        return $accbalancesheets;
    }
}
