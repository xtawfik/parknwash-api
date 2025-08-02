<?php

namespace App\Containers\AccForecast\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccForecastByIdAction extends Action
{
    public function run(Request $request)
    {
        $accforecast = Apiato::call('AccForecast@FindAccForecastByIdTask', [$request->id]);

        return $accforecast;
    }
}
