<?php

namespace App\Containers\AccRecurringCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccRecurringCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $accrecurringcategories = Apiato::call('AccRecurringCategory@GetAllAccRecurringCategoriesTask', [], ['addRequestCriteria']);

        return $accrecurringcategories;
    }
}
