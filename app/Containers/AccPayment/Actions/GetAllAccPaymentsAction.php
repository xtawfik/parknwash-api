<?php

namespace App\Containers\AccPayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPaymentsAction extends Action
{
    public function run(Request $request)
    {
        $accpayments = Apiato::call('AccPayment@GetAllAccPaymentsTask', [], ['addRequestCriteria']);

        return $accpayments;
    }
}
