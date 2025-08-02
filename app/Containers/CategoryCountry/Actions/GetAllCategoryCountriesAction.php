<?php

namespace App\Containers\CategoryCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCategoryCountriesAction extends Action
{
    public function run(Request $request)
    {
        $categorycountries = Apiato::call('CategoryCountry@GetAllCategoryCountriesTask', [], ['addRequestCriteria']);

        return $categorycountries;
    }
}
