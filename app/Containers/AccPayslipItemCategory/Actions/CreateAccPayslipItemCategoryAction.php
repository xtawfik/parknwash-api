<?php

namespace App\Containers\AccPayslipItemCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccPayslipItemCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslipitemcategory = Apiato::call('AccPayslipItemCategory@CreateAccPayslipItemCategoryTask', [$data]);

        return $accpayslipitemcategory;
    }
}
