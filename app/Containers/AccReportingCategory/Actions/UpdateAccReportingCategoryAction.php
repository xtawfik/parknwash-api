<?php

namespace App\Containers\AccReportingCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccReportingCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accreportingcategory = Apiato::call('AccReportingCategory@UpdateAccReportingCategoryTask', [$request->id, $data]);

        return $accreportingcategory;
    }
}
