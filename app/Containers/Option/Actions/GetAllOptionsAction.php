<?php

namespace App\Containers\Option\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllOptionsAction extends Action
{
    public function run(Request $request)
    {
        $options = Apiato::call('Option@GetAllOptionsTask', [], ['addRequestCriteria']);

        return $options;
    }
}
