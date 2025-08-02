<?php

namespace App\Containers\CustodyData\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCustodyDatasAction extends Action
{
    public function run(Request $request)
    {
        $custodydatas = Apiato::call('CustodyData@GetAllCustodyDatasTask', [], ['addRequestCriteria']);

        return $custodydatas;
    }
}
