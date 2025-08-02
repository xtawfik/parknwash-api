<?php

namespace App\Containers\OptionCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindOptionCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $optioncategory = Apiato::call('OptionCategory@FindOptionCategoryByIdTask', [$request->id]);

        return $optioncategory;
    }
}
