<?php

namespace App\Containers\Custody\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCustodyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $custody = Apiato::call('Custody@CreateCustodyTask', [$data]);

        return $custody;
    }
}
