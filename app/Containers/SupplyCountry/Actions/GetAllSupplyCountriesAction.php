<?php

namespace App\Containers\SupplyCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSupplyCountriesAction extends Action
{
    public function run(Request $request)
    {
        $supplycountries = Apiato::call('SupplyCountry@GetAllSupplyCountriesTask', [], ['addRequestCriteria']);

        return $supplycountries;
    }
}
