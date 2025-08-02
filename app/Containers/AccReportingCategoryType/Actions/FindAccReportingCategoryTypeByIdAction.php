<?php

namespace App\Containers\AccReportingCategoryType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccReportingCategoryTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $accreportingcategorytype = Apiato::call('AccReportingCategoryType@FindAccReportingCategoryTypeByIdTask', [$request->id]);

        return $accreportingcategorytype;
    }
}
