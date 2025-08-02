<?php

namespace App\Containers\AccPayslipContribution\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPayslipContributionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPayslipContribution@DeleteAccPayslipContributionTask', [$request->id]);
    }
}
