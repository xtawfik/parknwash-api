<?php

namespace App\Containers\ServiceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateServiceTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $servicetype = Apiato::call('ServiceType@UpdateServiceTypeTask', [$request->id, $data]);

        return $servicetype;
    }
}
