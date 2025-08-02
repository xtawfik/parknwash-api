<?php

namespace App\Containers\AccFooterCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccFooterCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accfootercategory = Apiato::call('AccFooterCategory@CreateAccFooterCategoryTask', [$data]);

        return $accfootercategory;
    }
}
