<?php

namespace App\Containers\AccPayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPaymentByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpayment = Apiato::call('AccPayment@FindAccPaymentByIdTask', [$request->id]);

        return $accpayment;
    }
}
