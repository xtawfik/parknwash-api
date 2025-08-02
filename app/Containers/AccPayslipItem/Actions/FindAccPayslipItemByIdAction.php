<?php

namespace App\Containers\AccPayslipItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPayslipItemByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipitem = Apiato::call('AccPayslipItem@FindAccPayslipItemByIdTask', [$request->id]);

        return $accpayslipitem;
    }
}
