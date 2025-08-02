<?php

namespace App\Containers\AccPayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccPaymentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayment = Apiato::call('AccPayment@CreateAccPaymentTask', [$data]);

        return $accpayment;
    }
}
