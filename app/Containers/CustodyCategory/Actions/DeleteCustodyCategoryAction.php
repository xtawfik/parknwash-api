<?php

namespace App\Containers\CustodyCategory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCustodyCategoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('CustodyCategory@DeleteCustodyCategoryTask', [$request->id]);
    }
}
