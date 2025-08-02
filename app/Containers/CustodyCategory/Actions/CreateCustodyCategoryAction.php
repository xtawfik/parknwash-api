<?php

namespace App\Containers\CustodyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCustodyCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $custodycategory = Apiato::call('CustodyCategory@CreateCustodyCategoryTask', [$data]);

        return $custodycategory;
    }
}
