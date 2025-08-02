<?php

namespace App\Containers\CustodyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCustodyCategoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $custodycategory = Apiato::call('CustodyCategory@FindCustodyCategoryByIdTask', [$request->id]);

        return $custodycategory;
    }
}
