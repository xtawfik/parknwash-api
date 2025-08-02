<?php

namespace App\Containers\AccReportingCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccReportingCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccReportingCategory@DeleteAccReportingCategoryTask', [$request->id]);
    }
}
