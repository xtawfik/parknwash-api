<?php

namespace App\Containers\CustodyData\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCustodyDataByIdAction extends Action
{
    public function run(Request $request)
    {
        $custodydata = Apiato::call('CustodyData@FindCustodyDataByIdTask', [$request->id]);

        return $custodydata;
    }
}
