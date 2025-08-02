<?php

namespace App\Containers\Contract\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllContractsAction extends Action
{
    public function run(Request $request)
    {
        $contracts = Apiato::call('Contract@GetAllContractsTask', [], ['addRequestCriteria']);

        return $contracts;
    }
}
