<?php

namespace App\Containers\CarCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCarCountryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('CarCountry@DeleteCarModelTask', [$request->id]);
    }
}
