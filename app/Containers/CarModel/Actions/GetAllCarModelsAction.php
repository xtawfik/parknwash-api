<?php

namespace App\Containers\CarModel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCarModelsAction extends Action
{
    public function run(Request $request)
    {
        $carmodels = Apiato::call('CarModel@GetAllCarModelsTask', [], ['addRequestCriteria']);

        return $carmodels;
    }
}
