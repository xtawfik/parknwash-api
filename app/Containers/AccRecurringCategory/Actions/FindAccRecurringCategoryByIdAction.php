<?php

namespace App\Containers\AccRecurringCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccRecurringCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $accrecurringcategory = Apiato::call('AccRecurringCategory@FindAccRecurringCategoryByIdTask', [$request->id]);

        return $accrecurringcategory;
    }
}
