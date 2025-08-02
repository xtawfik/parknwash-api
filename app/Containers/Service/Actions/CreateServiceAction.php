<?php

namespace App\Containers\Service\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateServiceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $service = Apiato::call('Service@CreateServiceTask', [$data]);

        return $service;
    }
}
