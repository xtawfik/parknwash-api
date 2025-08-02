<?php

namespace App\Containers\AccAccountCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccAccountCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accaccountcategory = Apiato::call('AccAccountCategory@CreateAccAccountCategoryTask', [$data]);

        return $accaccountcategory;
    }
}
