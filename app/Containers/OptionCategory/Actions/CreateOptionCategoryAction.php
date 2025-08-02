<?php

namespace App\Containers\OptionCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateOptionCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $optioncategory = Apiato::call('OptionCategory@CreateOptionCategoryTask', [$data]);

        return $optioncategory;
    }
}
