<?php

namespace App\Containers\AccAccountCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccAccountCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $accaccountcategories = Apiato::call('AccAccountCategory@GetAllAccAccountCategoriesTask', [], ['addRequestCriteria']);

        return $accaccountcategories;
    }
}
