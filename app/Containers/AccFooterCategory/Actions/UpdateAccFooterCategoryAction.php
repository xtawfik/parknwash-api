<?php

namespace App\Containers\AccFooterCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccFooterCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accfootercategory = Apiato::call('AccFooterCategory@UpdateAccFooterCategoryTask', [$request->id, $data]);

        return $accfootercategory;
    }
}
