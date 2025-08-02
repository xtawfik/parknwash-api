<?php

namespace App\Containers\AccReportingCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccReportingCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $accreportingcategory = Apiato::call('AccReportingCategory@FindAccReportingCategoryByIdTask', [$request->id]);

        return $accreportingcategory;
    }
}
