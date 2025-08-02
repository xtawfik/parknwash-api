<?php

namespace App\Containers\AccReportingCategoryType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccReportingCategoryTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accreportingcategorytype = Apiato::call('AccReportingCategoryType@CreateAccReportingCategoryTypeTask', [$data]);

        return $accreportingcategorytype;
    }
}
