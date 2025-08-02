<?php

namespace App\Containers\AccAccountCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccAccountCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccAccountCategory@DeleteAccAccountCategoryTask', [$request->id]);
    }
}
