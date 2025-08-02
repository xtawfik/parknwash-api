<?php

namespace App\Containers\AccBillableTime\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccBillableTimesAction extends Action
{
    public function run(Request $request)
    {
        $accbillabletimes = Apiato::call('AccBillableTime@GetAllAccBillableTimesTask', [], ['addRequestCriteria']);

        return $accbillabletimes;
    }
}
