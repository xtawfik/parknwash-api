<?php

namespace App\Containers\AccLatePayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccLatePaymentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acclatepayment = Apiato::call('AccLatePayment@CreateAccLatePaymentTask', [$data]);

        return $acclatepayment;
    }
}
