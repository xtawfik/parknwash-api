<?php

namespace App\Containers\AccPayslipItemCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPayslipItemCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipitemcategory = Apiato::call('AccPayslipItemCategory@FindAccPayslipItemCategoryByIdTask', [$request->id]);

        return $accpayslipitemcategory;
    }
}
