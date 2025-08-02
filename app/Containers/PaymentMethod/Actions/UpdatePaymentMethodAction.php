<?php

namespace App\Containers\PaymentMethod\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdatePaymentMethodAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $paymentmethod = Apiato::call('PaymentMethod@UpdatePaymentMethodTask', [$request->id, $data]);

        return $paymentmethod;
    }
}
