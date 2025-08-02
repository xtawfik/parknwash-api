<?php

namespace App\Containers\AccReportingCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccReportingCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accreportingcategory = Apiato::call('AccReportingCategory@CreateAccReportingCategoryTask', [$data]);

        return $accreportingcategory;
    }
}
