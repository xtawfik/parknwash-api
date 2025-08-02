<?php

namespace App\Containers\AccAccountCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccAccountCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $accaccountcategory = Apiato::call('AccAccountCategory@FindAccAccountCategoryByIdTask', [$request->id]);

        return $accaccountcategory;
    }
}
