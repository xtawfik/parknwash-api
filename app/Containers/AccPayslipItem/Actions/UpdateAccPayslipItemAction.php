<?php

namespace App\Containers\AccPayslipItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccPayslipItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslipitem = Apiato::call('AccPayslipItem@UpdateAccPayslipItemTask', [$request->id, $data]);

        return $accpayslipitem;
    }
}
