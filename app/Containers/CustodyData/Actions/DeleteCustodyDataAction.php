<?php

namespace App\Containers\CustodyData\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCustodyDataAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('CustodyData@DeleteCustodyDataTask', [$request->id]);
    }
}
