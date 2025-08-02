<?php

namespace App\Containers\Service\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindServiceByIdAction extends Action
{
    public function run(Request $request)
    {
        $service = Apiato::call('Service@FindServiceByIdTask', [$request->id]);

        return $service;
    }
}
