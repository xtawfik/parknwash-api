<?php

namespace App\Containers\AccCustomer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCustomerByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccustomer = Apiato::call('AccCustomer@FindAccCustomerByIdTask', [$request->id]);

        return $acccustomer;
    }
}
