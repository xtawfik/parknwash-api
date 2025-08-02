<?php

namespace App\Containers\Contract\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteContractAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Contract@DeleteContractTask', [$request->id]);
    }
}
