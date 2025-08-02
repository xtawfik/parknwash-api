<?php

namespace App\Containers\AccForecast\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccForecastsAction extends Action
{
    public function run(Request $request)
    {
        $accforecasts = Apiato::call('AccForecast@GetAllAccForecastsTask', [], ['addRequestCriteria']);

        return $accforecasts;
    }
}
