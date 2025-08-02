<?php

namespace App\Containers\AccSalesOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccSalesOrderAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccSalesOrder@DeleteAccSalesOrderTask', [$request->id]);
    }
}
