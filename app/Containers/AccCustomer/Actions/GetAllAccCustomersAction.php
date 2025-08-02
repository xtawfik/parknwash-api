<?php

namespace App\Containers\AccCustomer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCustomersAction extends Action
{
    public function run(Request $request)
    {
        $acccustomers = Apiato::call('AccCustomer@GetAllAccCustomersTask', [], ['addRequestCriteria']);

        return $acccustomers;
    }
}
