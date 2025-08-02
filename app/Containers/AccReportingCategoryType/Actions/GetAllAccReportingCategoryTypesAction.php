<?php

namespace App\Containers\AccReportingCategoryType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccReportingCategoryTypesAction extends Action
{
    public function run(Request $request)
    {
        $accreportingcategorytypes = Apiato::call('AccReportingCategoryType@GetAllAccReportingCategoryTypesTask', [], ['addRequestCriteria']);

        return $accreportingcategorytypes;
    }
}
