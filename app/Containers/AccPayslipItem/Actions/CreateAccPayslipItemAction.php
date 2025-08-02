<?php

namespace App\Containers\AccPayslipItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccPayslipItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslipitem = Apiato::call('AccPayslipItem@CreateAccPayslipItemTask', [$data]);

        return $accpayslipitem;
    }
}
