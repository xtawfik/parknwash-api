<?php

namespace App\Containers\AccFooterCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccFooterCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $accfootercategory = Apiato::call('AccFooterCategory@FindAccFooterCategoryByIdTask', [$request->id]);

        return $accfootercategory;
    }
}
