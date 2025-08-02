<?php

namespace App\Containers\ServiceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindServiceTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $servicetype = Apiato::call('ServiceType@FindServiceTypeByIdTask', [$request->id]);

        return $servicetype;
    }
}
