<?php

namespace App\Containers\AccFooterCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccFooterCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $accfootercategories = Apiato::call('AccFooterCategory@GetAllAccFooterCategoriesTask', [], ['addRequestCriteria']);

        return $accfootercategories;
    }
}
