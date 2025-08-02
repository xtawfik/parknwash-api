<?php

namespace App\Containers\PaymentMethod\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPaymentMethodsAction extends Action
{
    public function run(Request $request)
    {
        $paymentmethods = Apiato::call('PaymentMethod@GetAllPaymentMethodsTask', [], ['addRequestCriteria']);

        return $paymentmethods;
    }
}
