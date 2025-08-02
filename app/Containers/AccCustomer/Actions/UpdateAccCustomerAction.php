<?php

namespace App\Containers\AccCustomer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCustomerAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccustomer = Apiato::call('AccCustomer@UpdateAccCustomerTask', [$request->id, $data]);

        return $acccustomer;
    }
}
