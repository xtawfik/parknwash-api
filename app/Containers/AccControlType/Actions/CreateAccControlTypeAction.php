<?php

namespace App\Containers\AccControlType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccControlTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccontroltype = Apiato::call('AccControlType@CreateAccControlTypeTask', [$data]);

        return $acccontroltype;
    }
}
