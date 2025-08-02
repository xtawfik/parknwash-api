<?php

namespace App\Containers\CarModel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCarModelAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $carcountry = Apiato::call('CarModel@UpdateCarModelTask', [$request->id, $data]);

        return $carcountry;
    }
}
