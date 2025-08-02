<?php

namespace App\Containers\AccCapitalSubAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCapitalSubAccountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCapitalSubAccount@DeleteAccCapitalSubAccountTask', [$request->id]);
    }
}
