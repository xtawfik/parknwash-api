<?php

namespace App\Containers\CategoryCountry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCategoryCountryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('CategoryCountry@DeleteCategoryCountryTask', [$request->id]);
    }
}
