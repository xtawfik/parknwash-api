<?php

namespace App\Containers\AccPayment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPaymentAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPayment@DeleteAccPaymentTask', [$request->id]);
    }
}
