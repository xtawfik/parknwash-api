<?php

namespace App\Containers\AccRecurringCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccRecurringCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccRecurringCategory@DeleteAccRecurringCategoryTask', [$request->id]);
    }
}
