<?php

namespace App\Containers\AccReportingCategoryType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccReportingCategoryTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accreportingcategorytype = Apiato::call('AccReportingCategoryType@UpdateAccReportingCategoryTypeTask', [$request->id, $data]);

        return $accreportingcategorytype;
    }
}
