<?php

namespace App\Containers\Contract\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindContractByIdAction extends Action
{
    public function run(Request $request)
    {
        $contract = Apiato::call('Contract@FindContractByIdTask', [$request->id]);

        return $contract;
    }
}
