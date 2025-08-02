<?php

namespace App\Containers\Service\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteServiceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Service@DeleteServiceTask', [$request->id]);
    }
}
