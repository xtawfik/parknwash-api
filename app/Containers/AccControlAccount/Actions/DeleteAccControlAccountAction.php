<?php

namespace App\Containers\AccControlAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccControlAccountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccControlAccount@DeleteAccControlAccountTask', [$request->id]);
    }
}
