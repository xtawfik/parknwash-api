<?php

namespace App\Containers\AccSalesOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccSalesOrdersAction extends Action
{
    public function run(Request $request)
    {
        $accsalesorders = Apiato::call('AccSalesOrder@GetAllAccSalesOrdersTask', [], ['addRequestCriteria']);

        return $accsalesorders;
    }
}
