<?php

namespace App\Containers\AccPayslipContribution\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPayslipContributionsAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipcontributions = Apiato::call('AccPayslipContribution@GetAllAccPayslipContributionsTask', [], ['addRequestCriteria']);

        return $accpayslipcontributions;
    }
}
