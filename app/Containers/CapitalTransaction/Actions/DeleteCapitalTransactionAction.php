<?php

namespace App\Containers\CapitalTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCapitalTransactionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('CapitalTransaction@DeleteCapitalTransactionTask', [$request->id]);
    }
}
