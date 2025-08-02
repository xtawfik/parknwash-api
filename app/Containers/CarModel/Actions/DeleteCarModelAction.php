<?php

namespace App\Containers\CarModel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCarModelAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('CarModel@DeleteCarModelTask', [$request->id]);
    }
}
