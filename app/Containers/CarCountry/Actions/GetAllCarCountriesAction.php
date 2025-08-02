<?php

namespace App\Containers\CarCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCarCountriesAction extends Action
{
    public function run(Request $request)
    {
        $carcountries = Apiato::call('CarCountry@GetAllCarModelsTask', [], ['addRequestCriteria']);

        return $carcountries;
    }
}
