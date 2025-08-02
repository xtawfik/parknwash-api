<?php

namespace App\Containers\AccCapitalAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCapitalAccountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCapitalAccount@DeleteAccCapitalAccountTask', [$request->id]);
    }
}
