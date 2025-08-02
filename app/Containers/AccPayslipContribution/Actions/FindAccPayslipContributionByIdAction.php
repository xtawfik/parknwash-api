<?php

namespace App\Containers\AccPayslipContribution\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPayslipContributionByIdAction extends Action
{
    public function run(Request $request)
    {
        $accpayslipcontribution = Apiato::call('AccPayslipContribution@FindAccPayslipContributionByIdTask', [$request->id]);

        return $accpayslipcontribution;
    }
}
