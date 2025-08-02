<?php

namespace App\Containers\AccBillableTime\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccBillableTimeByIdAction extends Action
{
    public function run(Request $request)
    {
        $accbillabletime = Apiato::call('AccBillableTime@FindAccBillableTimeByIdTask', [$request->id]);

        return $accbillabletime;
    }
}
