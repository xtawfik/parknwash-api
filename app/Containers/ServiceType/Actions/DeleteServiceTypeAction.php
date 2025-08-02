<?php

namespace App\Containers\ServiceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteServiceTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ServiceType@DeleteServiceTypeTask', [$request->id]);
    }
}
