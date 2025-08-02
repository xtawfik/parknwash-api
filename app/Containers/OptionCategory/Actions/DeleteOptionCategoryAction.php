<?php

namespace App\Containers\OptionCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteOptionCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('OptionCategory@DeleteOptionCategoryTask', [$request->id]);
    }
}
