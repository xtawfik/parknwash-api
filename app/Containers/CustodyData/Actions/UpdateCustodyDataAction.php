<?php

namespace App\Containers\CustodyData\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCustodyDataAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $custodydata = Apiato::call('CustodyData@UpdateCustodyDataTask', [$request->id, $data]);

        return $custodydata;
    }
}
