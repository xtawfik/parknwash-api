<?php

namespace App\Containers\AccPayslipContribution\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccPayslipContributionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accpayslipcontribution = Apiato::call('AccPayslipContribution@UpdateAccPayslipContributionTask', [$request->id, $data]);

        return $accpayslipcontribution;
    }
}
