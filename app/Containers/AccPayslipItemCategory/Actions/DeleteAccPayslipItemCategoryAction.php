<?php

namespace App\Containers\AccPayslipItemCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPayslipItemCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPayslipItemCategory@DeleteAccPayslipItemCategoryTask', [$request->id]);
    }
}
