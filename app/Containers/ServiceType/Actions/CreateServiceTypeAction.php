<?php

namespace App\Containers\ServiceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateServiceTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $servicetype = Apiato::call('ServiceType@CreateServiceTypeTask', [$data]);

        return $servicetype;
    }
}
