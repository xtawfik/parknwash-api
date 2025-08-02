<?php

namespace App\Containers\AccPayslipItemCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPayslipItemCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipitemcategories = Apiato::call('AccPayslipItemCategory@GetAllAccPayslipItemCategoriesTask', [], ['addRequestCriteria']);

        return $accpayslipitemcategories;
    }
}
