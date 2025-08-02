<?php

namespace App\Containers\Service\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateServiceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $service = Apiato::call('Service@UpdateServiceTask', [$request->id, $data]);

        return $service;
    }
}
