<?php

namespace App\Containers\CarModel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCarModelByIdAction extends Action
{
    public function run(Request $request)
    {
        $carcountry = Apiato::call('CarModel@FindCarModelByIdTask', [$request->id]);

        return $carcountry;
    }
}
