<?php

namespace App\Containers\AccSalesOrder\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccSalesOrderByIdAction extends Action
{
    public function run(Request $request)
    {
        $accsalesorder = Apiato::call('AccSalesOrder@FindAccSalesOrderByIdTask', [$request->id]);

        return $accsalesorder;
    }
}
