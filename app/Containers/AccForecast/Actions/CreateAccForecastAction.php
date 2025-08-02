<?php

namespace App\Containers\AccForecast\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccForecastAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accforecast = Apiato::call('AccForecast@CreateAccForecastTask', [$data]);

        return $accforecast;
    }
}
