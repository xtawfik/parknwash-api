<?php

namespace App\Containers\AccReportingCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccReportingCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $accreportingcategories = Apiato::call('AccReportingCategory@GetAllAccReportingCategoriesTask', [], ['addRequestCriteria']);

        return $accreportingcategories;
    }
}
