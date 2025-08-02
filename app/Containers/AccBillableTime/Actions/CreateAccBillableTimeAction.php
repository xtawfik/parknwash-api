<?php

namespace App\Containers\AccBillableTime\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccBillableTimeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbillabletime = Apiato::call('AccBillableTime@CreateAccBillableTimeTask', [$data]);

        return $accbillabletime;
    }
}
