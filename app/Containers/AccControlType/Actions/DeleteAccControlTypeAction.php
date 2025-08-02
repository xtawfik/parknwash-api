<?php

namespace App\Containers\AccControlType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccControlTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccControlType@DeleteAccControlTypeTask', [$request->id]);
    }
}
