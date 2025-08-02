<?php

namespace App\Containers\Contract\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateContractAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $contract = Apiato::call('Contract@CreateContractTask', [$data]);

        return $contract;
    }
}
