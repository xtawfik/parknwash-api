<?php

namespace App\Containers\Country\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCountryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $country = Apiato::call('Country@UpdateCountryTask', [$request->id, $data]);

        return $country;
    }
}
