<?php

namespace App\Containers\AccSalesOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccSalesOrderAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accsalesorder = Apiato::call('AccSalesOrder@CreateAccSalesOrderTask', [$data]);

        return $accsalesorder;
    }
}
