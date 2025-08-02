<?php

namespace App\Containers\CarCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCarCountryByIdAction extends Action
{
    public function run(Request $request)
    {
        $carcountry = Apiato::call('CarCountry@FindCarModelByIdTask', [$request->id]);

        return $carcountry;
    }
}
