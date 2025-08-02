<?php

namespace App\Containers\AccForecast\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccForecastAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accforecast = Apiato::call('AccForecast@UpdateAccForecastTask', [$request->id, $data]);

        return $accforecast;
    }
}
