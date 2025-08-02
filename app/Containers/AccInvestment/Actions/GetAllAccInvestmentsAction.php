<?php

namespace App\Containers\AccInvestment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInvestmentsAction extends Action
{
    public function run(Request $request)
    {
        $accinvestments = Apiato::call('AccInvestment@GetAllAccInvestmentsTask', [], ['addRequestCriteria']);

        return $accinvestments;
    }
}
