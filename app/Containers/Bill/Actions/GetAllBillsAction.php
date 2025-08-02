<?php

namespace App\Containers\Bill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBillsAction extends Action
{
    public function run(Request $request)
    {
        $bills = Apiato::call('Bill@GetAllBillsTask', [], ['addRequestCriteria']);

        return $bills;
    }
}
