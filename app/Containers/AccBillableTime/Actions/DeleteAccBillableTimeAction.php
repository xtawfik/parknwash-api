<?php

namespace App\Containers\AccBillableTime\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccBillableTimeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccBillableTime@DeleteAccBillableTimeTask', [$request->id]);
    }
}
