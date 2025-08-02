<?php

namespace App\Containers\PaymentMethod\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindPaymentMethodByIdAction extends Action
{
    public function run(Request $request)
    {
        $paymentmethod = Apiato::call('PaymentMethod@FindPaymentMethodByIdTask', [$request->id]);

        return $paymentmethod;
    }
}
