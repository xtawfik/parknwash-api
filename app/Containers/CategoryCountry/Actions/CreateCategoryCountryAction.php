<?php

namespace App\Containers\CategoryCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCategoryCountryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $categorycountry = Apiato::call('CategoryCountry@CreateCategoryCountryTask', [$data]);

        return $categorycountry;
    }
}
