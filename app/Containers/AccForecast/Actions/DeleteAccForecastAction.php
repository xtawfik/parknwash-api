<?php

namespace App\Containers\AccForecast\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccForecastAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccForecast@DeleteAccForecastTask', [$request->id]);
    }
}
