<?php

namespace App\Containers\PaymentMethod\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePaymentMethodAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('PaymentMethod@DeletePaymentMethodTask', [$request->id]);
    }
}
