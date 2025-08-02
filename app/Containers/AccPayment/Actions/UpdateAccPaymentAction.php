<?php

namespace App\Containers\AccPayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccPaymentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayment = Apiato::call('AccPayment@UpdateAccPaymentTask', [$request->id, $data]);

        return $accpayment;
    }
}
