<?php

namespace App\Containers\AccCustomer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCustomerAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCustomer@DeleteAccCustomerTask', [$request->id]);
    }
}
