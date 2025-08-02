<?php

namespace App\Containers\AccLatePayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccLatePaymentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acclatepayment = Apiato::call('AccLatePayment@UpdateAccLatePaymentTask', [$request->id, $data]);

        return $acclatepayment;
    }
}
