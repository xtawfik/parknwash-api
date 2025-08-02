<?php

namespace App\Containers\CategoryCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCategoryCountryByIdAction extends Action
{
    public function run(Request $request)
    {
        $categorycountry = Apiato::call('CategoryCountry@FindCategoryCountryByIdTask', [$request->id]);

        return $categorycountry;
    }
}
