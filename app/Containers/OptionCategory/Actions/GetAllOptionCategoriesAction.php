<?php

namespace App\Containers\OptionCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllOptionCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $optioncategories = Apiato::call('OptionCategory@GetAllOptionCategoriesTask', [], ['addRequestCriteria']);

        return $optioncategories;
    }
}
