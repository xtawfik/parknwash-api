<?php

namespace App\Containers\SupplyCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSupplyCountryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $supplycountry = Apiato::call('SupplyCountry@UpdateSupplyCountryTask', [$request->id, $data]);

        return $supplycountry;
    }
}
