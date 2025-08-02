<?php

namespace App\Containers\CustodyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCustodyCategoriesAction extends Action
{
    public function run(Request $request)
    {
        $custodycategories = Apiato::call('CustodyCategory@GetAllCustodyCategoriesTask', [], ['addRequestCriteria']);

        return $custodycategories;
    }
}
