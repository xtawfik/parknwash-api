<?php

namespace App\Containers\City\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCityAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('City@DeleteCityTask', [$request->id]);
    }
}
