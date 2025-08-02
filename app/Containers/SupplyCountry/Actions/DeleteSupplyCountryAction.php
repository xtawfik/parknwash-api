<?php

namespace App\Containers\SupplyCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSupplyCountryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('SupplyCountry@DeleteSupplyCountryTask', [$request->id]);
    }
}
