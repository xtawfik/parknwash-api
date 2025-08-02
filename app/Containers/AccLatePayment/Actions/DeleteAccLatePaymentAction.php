<?php

namespace App\Containers\AccLatePayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccLatePaymentAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccLatePayment@DeleteAccLatePaymentTask', [$request->id]);
    }
}
