<?php

namespace App\Containers\AccFooterCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccFooterCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccFooterCategory@DeleteAccFooterCategoryTask', [$request->id]);
    }
}
