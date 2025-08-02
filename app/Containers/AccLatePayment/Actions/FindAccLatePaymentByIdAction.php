<?php

namespace App\Containers\AccLatePayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccLatePaymentByIdAction extends Action
{
    public function run(Request $request)
    {
        $acclatepayment = Apiato::call('AccLatePayment@FindAccLatePaymentByIdTask', [$request->id]);

        return $acclatepayment;
    }
}
