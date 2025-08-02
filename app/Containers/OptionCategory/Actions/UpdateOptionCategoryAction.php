<?php

namespace App\Containers\OptionCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateOptionCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $optioncategory = Apiato::call('OptionCategory@UpdateOptionCategoryTask', [$request->id, $data]);

        return $optioncategory;
    }
}
