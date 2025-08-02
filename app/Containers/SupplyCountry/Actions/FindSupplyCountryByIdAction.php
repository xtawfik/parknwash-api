<?php

namespace App\Containers\SupplyCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSupplyCountryByIdAction extends Action
{
    public function run(Request $request)
    {
        $supplycountry = Apiato::call('SupplyCountry@FindSupplyCountryByIdTask', [$request->id]);

        return $supplycountry;
    }
}
