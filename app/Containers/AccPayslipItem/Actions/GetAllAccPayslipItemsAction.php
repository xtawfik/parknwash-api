<?php

namespace App\Containers\AccPayslipItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPayslipItemsAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipitems = Apiato::call('AccPayslipItem@GetAllAccPayslipItemsTask', [], ['addRequestCriteria']);

        return $accpayslipitems;
    }
}
