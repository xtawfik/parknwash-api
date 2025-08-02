<?php

namespace App\Containers\Cover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCoverAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Cover@DeleteCoverTask', [$request->id]);
    }
}
