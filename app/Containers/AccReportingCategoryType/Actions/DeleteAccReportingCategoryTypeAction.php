<?php

namespace App\Containers\AccReportingCategoryType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccReportingCategoryTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccReportingCategoryType@DeleteAccReportingCategoryTypeTask', [$request->id]);
    }
}
