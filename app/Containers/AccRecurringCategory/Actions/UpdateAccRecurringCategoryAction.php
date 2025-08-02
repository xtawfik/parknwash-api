<?php

namespace App\Containers\AccRecurringCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccRecurringCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accrecurringcategory = Apiato::call('AccRecurringCategory@UpdateAccRecurringCategoryTask', [$request->id, $data]);

        return $accrecurringcategory;
    }
}
