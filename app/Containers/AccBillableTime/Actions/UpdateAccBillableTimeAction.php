<?php

namespace App\Containers\AccBillableTime\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccBillableTimeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbillabletime = Apiato::call('AccBillableTime@UpdateAccBillableTimeTask', [$request->id, $data]);

        return $accbillabletime;
    }
}
