<?php

namespace App\Containers\CarCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCarCountryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $carcountry = Apiato::call('CarCountry@UpdateCarModelTask', [$request->id, $data]);

        return $carcountry;
    }
}
