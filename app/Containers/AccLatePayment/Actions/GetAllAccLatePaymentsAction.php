<?php

namespace App\Containers\AccLatePayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccLatePaymentsAction extends Action
{
    public function run(Request $request)
    {
        $acclatepayments = Apiato::call('AccLatePayment@GetAllAccLatePaymentsTask', [], ['addRequestCriteria']);

        return $acclatepayments;
    }
}
